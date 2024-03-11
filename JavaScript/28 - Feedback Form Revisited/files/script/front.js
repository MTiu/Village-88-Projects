$(document).ready(function () {
    const socket = io();

    socket.on("greeting", function (data) {
        console.log(data.msg);
        socket.emit("thankyou", {
            msg: "Thank you for connecting me! -Client",
        });
    });
    socket.on("updated_message", function (data) {
        $(".submit-img").remove();
        if ($(".submitted-img").length !== 0) {
            $(".socket-msg").remove();
        } else {
            $(".socket").append(
                " <img class='submitted-img' src='images/rem submitted.png' alt='Picture of Rem'/>"
            );
        }
        $(".socket").append(
            `<section class='socket-msg'> <p>${data.msg}</p> </section>`
        );
    });
    socket.on("id_number", function (data) {
        $(".socket-msg").append(`<p>${data.random}</p>`);
    });
    $(".submit-button").on("click", function () {
        event.preventDefault();
        const formDataArray = $(".feedback").serializeArray();
        socket.emit("posting_form", {
            msg: formDataArray,
        });
    });
});
