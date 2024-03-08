const express = require("express");
const session = require("express-session");
const bodyParser = require("body-parser")
const app = express();

function produceRandom(data){
    data.coupon = Math.floor((Math.random()*90000000) + 1000000);
    data.discount = Math.floor(Math.random()* 100);
    return data;
}

app.use(
    session({
        secret: "mySikretCookie",
        resave: false,
        saveUninitialized: true,
        cookie: { maxAge: 600000 },
    })
);
app.use(express.static(__dirname + "/files"));
app.use(bodyParser.urlencoded({extended: true}));
app.set("views", __dirname + "/files/views");
app.set("view engine", "ejs");

app.listen(7777);

app.get('/',(req,res) =>{
    res.render("index", {data: req.session.data});
})

app.post('/process',(req,res)=>{
    let data = req.body;

    if(data.reset){
        req.session.data = '';
    } else if(data.claim){
        req.session.data.num--;
        produceRandom(data);
        req.session.data.coupon = data.coupon;
        req.session.data.discount = data.discount;
    } else if(!req.session.data){
        data.num = 9;
        produceRandom(data);
        req.session.data = data;
    } else {
        req.session.data.num--;
    }

    res.redirect('/');
    console.log('POST DATA',data);
})