$(document).ready(function () {
    let name = prompt("Please Enter your Name");
    while(name == null || name.trim() == ''){
        let name = prompt("Name can't be blank");
    }
    const socket = io();

    socket.on("connect",function(){
        socket.emit("update_spectators",{
            name:name
        });
    })

    socket.on("update_players",function(data){
        $('#player-list').html(data.players);
    })
    socket.on("update_spectators_display",function(data){
        $("#spectator-list").html(data.spectators);
    })
    const keys = {
        w: { pressed: false },
        a: { pressed: false },
        s: { pressed: false },
        d: { pressed: false },
        Space: { pressed: false },
    };
    const maxLeft        = Math.floor($("main").offset().left);
    const maxTop         = $("main").offset().top;
    const maxRight       = $("main").offset().left + $("main").outerWidth()-105;
    const maxBottom      = $("main").offset().top + $("main").outerHeight()-115;
    const randomSpawnLoc = Math.floor(Math.random()*480)+150;
    
    const AGI            = 6;
    const player1        = new Player(maxLeft,randomSpawnLoc);

    player1.createPlayer();

    setInterval(() => {
        if (keys.w.pressed) {
            if (player1.y > maxTop) {
                player1.y -= AGI;
                $("#lol").css("top", `${player1.y}px`);
            }
        }
        if (keys.a.pressed) {
            if (player1.x > maxLeft) {
                player1.x -= AGI;
                $("#lol").css("left", `${player1.x}px`);
            }
        }
        if (keys.s.pressed) {
            if(player1.y < maxBottom){
                player1.y += AGI;
                $("#lol").css("top", `${player1.y}px`);
            }
        }
        if (keys.d.pressed) {
            if(player1.x < maxRight){
                player1.x += AGI;
                $("#lol").css("left", `${player1.x}px`);
            }
        }
        if (keys.Space.pressed){
            // $("main").append("<img src='images/fireball.gif' alt='fireball' />");
        }
    }, 15);

    $(document).on("keydown", (event) => {
        if (event.code === "KeyW") {
            keys.w.pressed = true;
        } else if (event.code === "KeyA") {
            keys.a.pressed = true;
        } else if (event.code === "KeyS") {
            keys.s.pressed = true;
        } else if (event.code === "KeyD") {
            keys.d.pressed = true;
        } else if (event.code === "Space"){
            keys.Space.pressed = true;
        }
    });

    $(document).on("keyup", (event) => {
        if (event.code === "KeyW") {
            keys.w.pressed = false;
        } else if (event.code === "KeyA") {
            keys.a.pressed = false;
        } else if (event.code === "KeyS") {
            keys.s.pressed = false;
        } else if (event.code === "KeyD") {
            keys.d.pressed = false;
        } else if (event.code === "Space"){
            keys.Space.pressed = false;
        }
    });

    $(document).on("click","#audio-button", ()=>{
        if($("#audio-button").css("background-color") == "rgb(255, 255, 255)"){
            $("#audio-button").css("background-color","black").css("color","white");
            music.pause();
        } else {
            $("#audio-button").css("background-color","white").css("color","black");
            music.play();
        }
    })

    $(document).on("click", "#join-button", ()=>{
            socket.emit("join")
    })
});
