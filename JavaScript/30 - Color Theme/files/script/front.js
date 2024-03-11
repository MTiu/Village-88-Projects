$(document).ready(function () {
    setInterval(() => {
        $("#random").css("background-color", `rgb(${Math.floor(Math.random() * 256)},${Math.floor(Math.random() * 256)},${Math.floor(Math.random() * 256)})`)
    }, 1000);

    const socket = io();

    $("#light").on("click",function(){
        socket.emit("light_mode");
    });
    $("#dark").on("click",function(){
        socket.emit("dark_mode");
    });
    $("#random").on("click",function(){
        socket.emit("random_mode");
    });

    socket.on("new_user", function (data) {
        $('body').css("background-color",data.color);
    });
    socket.on("light_display",function(data){
        $('body').css("background-color",data.color);
    })
    socket.on("dark_display",function(data){
        $('body').css("background-color",data.color);
    })
    socket.on("random_display",function(data){
        $('body').css("background-color",data.color);
    })
});
