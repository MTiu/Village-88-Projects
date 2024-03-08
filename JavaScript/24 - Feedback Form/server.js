const express = require("express");
const session = require("express-session");
const bodyParser = require("body-parser")
const app = express();
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
    res.render("index",{data:req.session.error});
})

app.get('/result', (req,res)=>{
    res.render('result', {data: req.session.data});
})

app.post('/process',(req,res)=>{
    let data = req.body;
    console.log('POST DATA',data);

    if(data.name){
        req.session.error = "";
        req.session.data = data;
        res.redirect('result');
    } else {
        req.session.error = "Name isn't optional! IT'S ALL A LIE!";
        res.redirect('/');
    }
})