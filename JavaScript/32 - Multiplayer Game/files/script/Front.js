$(document).ready(function () {
    let name = prompt("Please Enter your Name");
    while (name == null || name.trim() == "") {
        name = prompt("Name can't be blank");
    }
    const socket = io();

    // Location Defaults
    const maxLeft = Math.floor($("main").offset().left);
    const maxTop = $("main").offset().top;
    const maxRight = Math.floor(
        $("main").offset().left + $("main").outerWidth() - 105
    );
    const maxBottom = $("main").offset().top + $("main").outerHeight() - 115;
    const randomSpawnLoc = Math.floor(Math.random() * 480) + 150;

    //Projectile Defaults
    let lastFired = 0;
    const fireCD = 200;

    const AGI = 6;
    const players = {};
    const projectiles = {};
    const enemies = {};

    setInterval(() => {
        if (keys.w.pressed) {
            if (players[socket.id].y > maxTop) {
                players[socket.id].y -= AGI;
                socket.emit("key_pressed", "KeyW");
                $(`#${players[socket.id].id}`).css(
                    "top",
                    `${players[socket.id].y}px`
                );
            }
        }
        if (keys.a.pressed) {
            if (players[socket.id].x > maxLeft) {
                players[socket.id].x -= AGI;
                socket.emit("key_pressed", "KeyA");
                $(`#${players[socket.id].id}`).css(
                    "left",
                    `${players[socket.id].x}px`
                );
            }
        }
        if (keys.s.pressed) {
            if (players[socket.id].y < maxBottom) {
                players[socket.id].y += AGI;
                socket.emit("key_pressed", "KeyS");
                $(`#${players[socket.id].id}`).css(
                    "top",
                    `${players[socket.id].y}px`
                );
            }
        }
        if (keys.d.pressed) {
            if (players[socket.id].x < maxRight) {
                players[socket.id].x += AGI;
                socket.emit("key_pressed", "KeyD");
                $(`#${players[socket.id].id}`).css(
                    "left",
                    `${players[socket.id].x}px`
                );
            }
        }
        if (keys.Space.pressed) {
            const currentTime = Date.now();
            if (currentTime - lastFired >= fireCD) {
                socket.emit("fireball", {
                    x: players[socket.id].x,
                    y: players[socket.id].y,
                });
                lastFired = currentTime;
            }
            if (fireballSFX.paused) {
                fireballSFX.play();
            }
        }
    }, 15);

    socket.on("connect", function () {
        socket.emit("new_user", {
            name: name,
        });
        socket.emit("init_screen", {
            maxLeft: maxLeft,
            maxRight: maxRight,
        });
    });

    socket.on('score_update', function(data){
        $("#player-score").html("Score: "+data);
    })

    socket.on("enemy_display", function (data) {
        for (const id in data) {
            if (!enemies[id]) {
                enemies[id] = new Ghost(data[id].x, data[id].y, data[id].AGI,data[id].hp, data[id].img);
            } else {
                enemies[id].img.css("left", data[id].x + "px");
            }
        }
        for (const id in enemies) {
            if (!data[id]) {
                enemies[id].img.remove();
                delete enemies[id];
            }
        }
    });

    socket.on("enemy_death_sfx", function () {
        enemy_deathSFX.play();
    });

    socket.on("fireball_display", function (data) {
        for (const id in data) {
            if (!projectiles[id]) {
                projectiles[id] = new Fireball(
                    data[id].x,
                    data[id].y,
                    data[id].playerID,
                    data[id].img
                );
            } else {
                projectiles[id].img.css("left", data[id].x + "px");
            }
        }

        for (const id in projectiles) {
            if (!data[id]) {
                projectiles[id].img.remove();
                delete projectiles[id];
            }
        }
    });

    socket.on("update_players", function (data) {
        $("#player-list").html("");
        for (const id in data) {
            $("#player-list").append(`<li><p>Name: ${data[id].name}</p></li>`);
            $("#special-count").html("x"+data[id].specialProj);
            if (!players[id]) {
                players[id] = new Player(
                    id,
                    data[id].x,
                    data[id].y,
                    data[id].name
                );
                players[id].createPlayer();
            } else {
                players[id].x = data[id].x;
                players[id].y = data[id].y;
                players[id].move();
            }
        }
        for (const id in players) {
            if (!data[id]) {
                players[id].removePlayer();
                delete players[id];
            }
        }
    });

    socket.on("update_spectators_display", function (data) {
        $("#spectator-list").html(data.spectators);
    });
    const keys = {
        w: { pressed: false },
        a: { pressed: false },
        s: { pressed: false },
        d: { pressed: false },
        Space: { pressed: false },
    };

    socket.on("hp_deducted", function (data) {
        $("#player-hp").html("HP: " + data);
    });

    socket.on("player_death_sfx", function(){
        player_deathSFX.play();
    })

    $(document).on("keydown", (event) => {
        if (!players[socket.id]) return;
        if (event.code === "KeyW") {
            keys.w.pressed = true;
        } else if (event.code === "KeyA") {
            keys.a.pressed = true;
        } else if (event.code === "KeyS") {
            keys.s.pressed = true;
        } else if (event.code === "KeyD") {
            keys.d.pressed = true;
        } else if (event.code === "Space") {
            keys.Space.pressed = true;
        } else if (event.code === "KeyF"){
            socket.emit("special_move",{
                x: players[socket.id].x,
                y: players[socket.id].y,
            });
        }
    });

    $(document).on("keyup", (event) => {
        if (!players[socket.id]) return;
        if (event.code === "KeyW") {
            keys.w.pressed = false;
        } else if (event.code === "KeyA") {
            keys.a.pressed = false;
        } else if (event.code === "KeyS") {
            keys.s.pressed = false;
        } else if (event.code === "KeyD") {
            keys.d.pressed = false;
        } else if (event.code === "Space") {
            keys.Space.pressed = false;
        }
    });

    $(document).on("click", "#audio-button", () => {
        if (!music.paused) {
            $("#audio-button")
                .css("background-color", "black")
                .css("color", "white");
            music.pause();
        } else {
            $("#audio-button")
                .css("background-color", "white")
                .css("color", "black");
            music.play();
        }
    });

    $(document).on("click", "#join-button", () => {
        $("#player-hp").html("HP: 3");
        if (!players[socket.id]) {
            socket.emit("join", {
                characters: new Player(
                    socket.id,
                    maxLeft,
                    randomSpawnLoc,
                    name
                ),
            });
        }
    });
});
