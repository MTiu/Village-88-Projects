const express = require("express");
const app = express();
const server = app.listen(7777);
const io = require("socket.io")(server, {
    pingInterval: 2000,
    pingTimeout: 5000,
});
const AGI = 6;
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
const current_projectiles = {};
const current_enemies = {};
let projectileID = 0;
let enemyID = 0;
let maxLeft = 0;
let maxRight = 0;

/* Control for Sockets */
io.on("connection", function (socket) {
    socket.on("new_user", function (data) {
        current_spectators[socket.id] = `<li>${data.name}</li>`;
        io.emit("update_spectators_display", {
            spectators: Object.values(current_spectators),
        });
        io.emit("update_players", current_players);
    });

    socket.on("disconnect", function () {
        delete current_spectators[socket.id];
        delete current_players[socket.id];
        io.emit("update_spectators_display", {
            spectators: Object.values(current_spectators),
        });
        io.emit("update_players", current_players);
    });

    socket.on('init_screen', function(data){
        maxLeft = data.maxLeft;
        maxRight = data.maxRight;
    });

    socket.on("join", function (data) {
        const { name, hp, x, y, specialProj, score } = data.characters;
        current_players[socket.id] = { name, hp, x, y, specialProj, score };
        io.emit("update_players", current_players);
        delete current_spectators[socket.id];
        io.emit("update_spectators_display", {
            spectators: Object.values(current_spectators),
        });
    });

    socket.on("key_pressed", function (data) {
        if (data == "KeyW") {
            current_players[socket.id].y -= AGI;
        }
        if (data == "KeyA") {
            current_players[socket.id].x -= AGI;
        }
        if (data == "KeyS") {
            current_players[socket.id].y += AGI;
        }
        if (data == "KeyD") {
            current_players[socket.id].x += AGI;
        }
    });

    socket.on("fireball", function (data) {
        projectileID++;
        current_projectiles[projectileID] = {
            x: data.x,
            y: data.y,
            velocity: 5,
            playerID: socket.id,
        };
    });
});

setInterval(()=>{
    enemyID++
    current_enemies[enemyID] = {
        x: maxRight,
        y: Math.floor(Math.random() * 480) + 150,
        AGI: 5,
    }
},800)

setInterval(() => {
    for (const id in current_projectiles) {
        current_projectiles[id].x += current_projectiles[id].velocity;
        if(current_projectiles[id].x >= maxRight){
            delete current_projectiles[id];
        }
    }
    for (const id in current_enemies) {
        current_enemies[id].x -= current_enemies[id].AGI;
        if(current_enemies[id].x <= maxLeft){
            delete current_enemies[id];
        }
    }

    io.emit("enemy_display", current_enemies);
    io.emit("fireball_display", current_projectiles);
    io.emit("update_players", current_players);
}, 15);
