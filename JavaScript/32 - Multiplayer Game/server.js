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

const invulnerabilityDuration = 3000;
const current_spectators = {};
const current_players = {};
const current_projectiles = {};
const current_enemies = {};
let projectileID = 0;
let enemyID = 0;
let maxLeft = 0;
let maxRight = 0;
let score = 0;
let lastSpecialEnemyScore = 0;

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

    socket.on("init_screen", function (data) {
        maxLeft = data.maxLeft;
        maxRight = data.maxRight;
    });

    socket.on("join", function (data) {
        const { name, hp, x, y, specialProj, score } = data.characters;
        const width = 60;
        const height = 80;
        const isInvulnerable = false;
        current_players[socket.id] = {
            name,
            hp,
            x,
            y,
            specialProj,
            score,
            width,
            height,
            isInvulnerable,
        };
        io.emit("update_players", current_players);
        delete current_spectators[socket.id];
        io.emit("update_spectators_display", {
            spectators: Object.values(current_spectators),
        });
    });

    socket.on("key_pressed", function (data) {
        if (!current_players[socket.id]) return;
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
            width: 57,
            height: 48,
            dmg: 2,
            img: "/images/fireball.gif",
        };
    });

    socket.on("special_move", function (data) {
        if (current_players[socket.id].specialProj !== 0) {
            current_players[socket.id].specialProj--;
            projectileID++;
            current_projectiles[projectileID] = {
                x: data.x,
                y: data.y,
                velocity: 2,
                playerID: socket.id,
                width: 192,
                height: 160,
                dmg: 3,
                img: "/images/gravity.gif",
            };
        }
    });
});

setInterval(() => {
    enemyID++;
    current_enemies[enemyID] = {
        x: maxRight,
        y: Math.floor(Math.random() * 480) + 150,
        AGI: 2,
        hp: 50,
        img: "/images/enemy2.gif",
        width: 84,
        height: 84,
    };
}, 2000);

setInterval(() => {
    enemyID++;
    current_enemies[enemyID] = {
        x: maxRight,
        y: Math.floor(Math.random() * 480) + 150,
        AGI: 5,
        hp: 1,
        img: "/images/enemy1.gif",
        width: 57,
        height: 57,
    };
}, 800);

setInterval(() => {
    for (const id in current_projectiles) {
        current_projectiles[id].x += current_projectiles[id].velocity;
        if (current_projectiles[id].x >= maxRight) {
            delete current_projectiles[id];
            continue;
        }

        for (const enemyID in current_enemies) {
            if (
                current_projectiles[id].x <=
                    current_enemies[enemyID].x +
                        current_enemies[enemyID].width &&
                current_projectiles[id].x + current_projectiles[id].width >=
                    current_enemies[enemyID].x &&
                current_projectiles[id].y <=
                    current_enemies[enemyID].y +
                        current_enemies[enemyID].height &&
                current_projectiles[id].y + current_projectiles[id].height >=
                    current_enemies[enemyID].y
            ) {
                current_enemies[enemyID].hp -= current_projectiles[id].dmg;

                if (current_enemies[enemyID].hp <= 0) {
                    delete current_enemies[enemyID];
                    io.emit("enemy_death_sfx");
                    score++;
                    io.emit("score_update", score);
                }
                if (current_projectiles[id].dmg !== 3) {
                    delete current_projectiles[id];
                }
                break;
            }
        }
    }
    for (const enemyID in current_enemies) {
        current_enemies[enemyID].x -= current_enemies[enemyID].AGI;
        if (current_enemies[enemyID].x <= maxLeft) {
            delete current_enemies[enemyID];
            continue;
        }

        for (const playerID in current_players) {
            if (current_players[playerID].isInvulnerable) continue;

            if (
                current_enemies[enemyID].x <=
                    current_players[playerID].x +
                        current_players[playerID].width &&
                current_enemies[enemyID].x + current_enemies[enemyID].width >=
                    current_players[playerID].x &&
                current_enemies[enemyID].y <=
                    current_players[playerID].y +
                        current_players[playerID].height &&
                current_enemies[enemyID].y + current_enemies[enemyID].height >=
                    current_players[playerID].y
            ) {
                current_players[playerID].hp -= 1;
                if (current_players[playerID].hp === 0) {
                    io.to(playerID).emit(
                        "hp_deducted",
                        current_players[playerID].hp
                    );
                    current_spectators[
                        playerID
                    ] = `<li>${current_players[playerID].name}</li>`;
                    io.emit("update_spectators_display", {
                        spectators: Object.values(current_spectators),
                    });
                    io.emit("player_death_sfx");
                    delete current_players[playerID];
                    continue;
                }
                current_players[playerID].isInvulnerable = true;
                setTimeout(() => {
                    current_players[playerID].isInvulnerable = false;
                }, invulnerabilityDuration);
                io.to(playerID).emit(
                    "hp_deducted",
                    current_players[playerID].hp
                );
                break;
            }
        }
    }

    io.emit("enemy_display", current_enemies);
    io.emit("fireball_display", current_projectiles);
    io.emit("update_players", current_players);
    if (score >= lastSpecialEnemyScore + 10) {
        lastSpecialEnemyScore = score;
        enemyID++;
        current_enemies[enemyID] = {
            x: maxRight,
            y: Math.floor(Math.random() * 480) + 150,
            AGI: 4,
            hp: 30,
            img: "/images/enemy3.gif",
            width: 154,
            height: 154,
        };
    }
}, 15);

setInterval(() => {
    for (const id in current_players) {
        current_players[id].specialProj++;
    }
}, 60000);
