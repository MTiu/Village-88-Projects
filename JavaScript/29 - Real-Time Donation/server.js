const express = require("express");
const app = express();
const server = app.listen(7777);
const io = require("socket.io")(server);
const session = require("express-session");

app.use(express.static(__dirname + "/files"));
app.use(
    session({
        secret: "mySikretCookie",
        resave: false,
        saveUninitialized: true,
        cookie: { maxAge: 600000 },
    })
);

/* Control for Routes of Directory */
app.set("views", __dirname + "/files/views");
app.set("view engine", "ejs");

/* Control for Routes */
app.get("/", (req, res) => {
    res.render("index");
});

/* Control for Sockets */
function getDate(){
    const currentDate = new Date();
    const currentTime = currentDate.toLocaleString("en-US", {
        year: "numeric",
        month: "2-digit",
        day: "2-digit",
        hour: "2-digit",
        minute: "2-digit",
        second: "2-digit",
        hour12: false,
    });
    return currentTime;
}
let number = 100;

io.on("connection", function (socket) {
    socket.on("thankyou", function (data) {
        console.log(data.msg, number);
    });
    socket.emit("greeting", {
        number: number,
    });

    socket.on("donate", function () {
        io.emit("display_donate", {
            number:(number += 10),
            msg: `Donated, the current money by this time is ${(number)}`,
            time:getDate()
        });
    });
    socket.on("redeem", function () {

        if (number == 0) {
            io.emit("display_redeem", {
                number:"CAN'T REDEEM PLEASE DONATE AGAIN!!!",
                msg: "CAN'T REDEEM PLEASE DONATE AGAIN!!!",
                time:getDate()
            });
        } else {
            io.emit("display_redeem", {
                number:(number -= 10),
                msg: `Redeemed, the current money by this time is ${(number)}`,
                time:getDate()
            });
        }
    });
});
