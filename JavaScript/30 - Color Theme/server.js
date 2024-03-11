const express    = require("express");
const app        = express();
const server     = app.listen(7777);
const io         = require("socket.io")(server);

app.use(express.static(__dirname + "/files"));

/* Control for Routes of Directory */
app.set("views", __dirname + "/files/views");
app.set("view engine", "ejs");

/* Control for Routes */
app.get("/", (req, res) => {
    res.render("index");
});

function createColor(){
    let red = Math.floor(Math.random() * 256);
    let green = Math.floor(Math.random() * 256);
    let blue = Math.floor(Math.random() * 256);
    let color = `rgb(${red}, ${green}, ${blue})`;
    return color;
}

let color = '';
let current_color = '';
/* Control for Sockets */
io.on("connection", function (socket) {
    if(color == ''){
        color = createColor();
        current_color = color;
        socket.emit("new_user", {
            msg: "Greetings, from server Node, brought to you by Sockets! -Server",
            color: color
        }); 
    }else{
        socket.emit("new_user", {
            msg: "Greetings, from server Node, brought to you by Sockets! -Server",
            color: current_color
        }); 
    }
    socket.on("light_mode", function () {
            color = "rgb(255,255,255)";
            current_color = color;
        io.emit("light_display",{
            color: color
        });
    });
    socket.on("dark_mode", function () {
        color = "rgb(0,0,0)";
        current_color = color;
        io.emit("dark_display",{
            color: color
        });
    });
    socket.on("random_mode", function () {
        color = createColor();
        current_color = color;
        io.emit("random_display",{
            color:color
        });
    });

});


