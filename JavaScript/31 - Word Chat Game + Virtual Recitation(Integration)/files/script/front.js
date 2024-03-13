$(document).ready(function () {
    let name = prompt("Enter your name");
    while( name == '' || name == null){
        name = prompt("Don't put empty space or blank a name");
    }
    
    const scrollbar = $(".chats");
    const socket = io();

    socket.on("new_user", function (data) {
        $(".chats").html(data.chat);
        $("#guess").html(data.word);
        socket.emit("notify_all_entered",{
            name: name,
        })
        scrollbar.scrollTop(scrollbar.prop("scrollHeight"));
    });

    socket.on("notify_all_enterDisplay",function(data){
        $(".chats").append(data.msg);
        scrollbar.scrollTop(scrollbar.prop("scrollHeight"));
    });

    socket.on("chat_display", function (data) {
        $(".chats").append(data.msg);
        scrollbar.scrollTop(scrollbar.prop("scrollHeight"));
    });

    socket.on("success",function(data){
        $(".chats").append(data.msg);
        $(".chats").append(data.img)
        $("#guess").html(data.word);
        scrollbar.scrollTop(scrollbar.prop("scrollHeight"));
    })

    socket.on("display_disconnected",function(data){
        $(".chats").append(data.msg);
        scrollbar.scrollTop(scrollbar.prop("scrollHeight"));
    })

    socket.on("update_users",function(data){
        $("aside").html(data.users);
        $("aside").prepend("<h1>Players</h1>");
    })

    $(".submit").on("click", function () {
        if($(".input-guess").val().trim() == ''){
            $(".input-guess").css("outline","1px solid red");
            $(".input-guess").attr("placeholder","PUT TEXT HERE!!");
        } else{
            $(".input-guess").css("outline","none");
            socket.emit("chat", {
                msg: $(".input-guess").val(),
                name: name,
            });
            $(".input-guess").val('');
        }
        scrollbar.scrollTop(scrollbar.prop("scrollHeight"));
    });

});
