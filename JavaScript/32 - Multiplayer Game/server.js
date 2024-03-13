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

const current_spectators = {};
const current_players = {};

/* Control for Sockets */
io.on("connection", function (socket) {
    socket.on("update_spectators",function(data){
        current_spectators[socket.id] = `<li>${data.name}</li>`
        io.emit("update_spectators_display",{
            spectators: Object.values(current_spectators)
        })
    })

    socket.on("disconnect", function(){
        delete current_spectators[socket.id];
        delete current_players[socket.id];
        io.emit("update_spectators_display",{
            spectators: Object.values(current_spectators)
        })
        io.emit("update_players",{
            players: Object.values(current_players)
        })
    })

    socket.on("join",function(){
        current_players[socket.id] = current_spectators[socket.id];
        io.emit("update_players",{
            players: Object.values(current_players)
        })
        delete current_spectators[socket.id];
        io.emit("update_spectators_display",{
            spectators: Object.values(current_spectators)
        })
    })
});



