$(document).ready(function () {
    const socket = io(); //1

    socket.on("greeting", function (data) {
        //4
        console.log(data.msg); //5
        socket.emit("thankyou", {
            msg: "Thank you for connecting me! -Client",
        }); //6
    });
    socket.on("processed_submit", function (data) {
        $(".submit-img").remove();
        if($(".submitted-img").length !== 0){
            $(".socket-msg").remove();
        } else {
            $(".socket").append(" <img class='submitted-img' src='images/rem submitted.png' alt='Picture of Rem'/>");
        }
        $(".socket").append("<section class='socket-msg'></section>");
        $(".socket-msg").append(`<p>${data.msg}</p>`);
        $(".socket-msg").append(`<p>${data.random}</p>`);
    });
    $(".submit-button").on("click", function () {
        event.preventDefault();
        const formDataArray = $(".feedback").serializeArray();
        socket.emit("submit", {
            msg: formDataArray,
        });
    });
});
