$(document).ready(function () {
    const socket = io();

    $("#donate-button").on("click",()=>{
        socket.emit("donate");
    })
    $("#redeem-button").on("click",()=>{
        socket.emit("redeem");
    })

    socket.on("greeting", function (data) {
        console.log(data.msg);
        socket.emit("thankyou", {
            msg: "Thank you for connecting me! -Client",
        });
        $(".donation").html(`$${data.number}`);
    });
    socket.on("display_donate", function(data){
        $(".donation").html(`$${data.number}`);
        $(".history").append(`<p>${data.time}: ${data.msg}</p>`);
        $("img").attr("src","images/money.gif");
    })
    socket.on("display_redeem", function(data){
        $(".donation").html(`$${data.number}`);
        $(".history").append(`<p>${data.time}: ${data.msg}</p>`);
        $("img").attr("src","images/redeem.gif");
    })
});
