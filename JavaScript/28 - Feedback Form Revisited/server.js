const express = require("express");
// const session = require("express-session");
const bodyParser = require("body-parser");
const app = express();
const server = app.listen(7777);
const io = require("socket.io")(server);

// app.use(
//     session({
//         secret: "mySikretCookie",
//         resave: false,
//         saveUninitialized: true,
//         cookie: { maxAge: 600000 },
//     })
// );

app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static(__dirname + "/files"));
app.use(express.static(__dirname + "/node_modules/socket.io/client-dist"));
app.set("views", __dirname + "/files/views");
app.set("view engine", "ejs");

app.get("/", (req, res) => {
    res.render("index");
});

io.on("connection", function (socket) {
    socket.emit("greeting", {
        msg: "Greetings, from server Node, brought to you by Sockets! -Server",
    }); 
    socket.on("thankyou", function (data) {
        console.log(data.msg); 
    });

    socket.on("posting_form", function (data) {
        let name = (data.msg[0].value)? data.msg[0].value: "You put no name";
        let course = (data.msg[1].value)? data.msg[1].value: "You're a malicious hacker";
        let score = (data.msg[2].value)? data.msg[2].value: "You're a malicious hacker";
        let reason = (data.msg[3].value)? data.msg[3].value: "You put no reason";
        let random = Math.floor((Math.random()*1000));
        socket.emit("updated_message",{
            msg: `Goshujin-sama(You) emitted the following values to the server:{name: ${name}, course_title: ${course}, score: ${score}, reason: ${reason}}`,
        })
        socket.emit("id_number", {
            random: `Random generated id number is ${random}.`
        })
    });
});
