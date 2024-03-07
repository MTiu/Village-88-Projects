const express = require("express");
const session = require("express-session");

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
app.set("views", __dirname + "/files/views");
app.set("view engine", "ejs");

app.listen(7777);


app.get('/',(req,res) =>{
    if(req.session.repeat == 1 || req.session.repeat){
        req.session.repeat = 0;
    } else {
        req.session.num = (req.session.num)? req.session.num + 1 : 1;
    }
    let msg = (req.session.num % 2 == 0)? "Even flowers need rain" : "Beat the odds";
    res.render("index",{number : req.session.num, message: msg});
})

app.get('/reset',(req,res)=>{
    req.session.num = 0;
    res.redirect('/');
})

app.get('/repeat',(req,res)=>{
    req.session.repeat = 1;
    res.redirect('/');
})