let bitcoin = [];
let count = 5;
let initial = 0;

function add(scrollableContainer, initial, count){
    $(".loading").remove();
    for(let i = initial; i< count; i++){
        scrollableContainer.append("<p>"+(i+1)+". "+ bitcoin[i].name +"</p>");
    }
}

$(document).ready(function () {
    $.get("/crypto", function (data) {
        bitcoin = data;
        console.log("got the data", data);
        while (
            scrollableContainer[0].scrollHeight <= scrollableContainer.innerHeight()
        ) {
            add(scrollableContainer,initial,count);
            initial +=5;
            count+=5;
        }
    },"json");

    $("button").on("click",function(){
        if(initial < 100){
            for(let i = initial; i< 100; i++){
                scrollableContainer.append("<p>"+(i+1)+". "+ bitcoin[i].name +"</p>");
            }
            if($(".last").length === 0){
            scrollableContainer.append("<p class='last'> Nothing Left </p>")
                } 
            count = 101;
            initial = 101;
        }
    })

    let scrollableContainer = $("#output-div");
    scrollableContainer.append("<img src='images/loading.gif' alt='GIF of Chuunibyou Loading' class='loading'>");
    scrollableContainer.scroll(function () {
        if (
            scrollableContainer.scrollTop() +
                scrollableContainer.innerHeight() >=
            scrollableContainer[0].scrollHeight
        ) {
            if($(".loading").length === 0){
                if(count > 100){
                    if($(".last").length === 0){
                    scrollableContainer.append("<p class='last'> Nothing Left </p>")
                    } 
                } else {
                    scrollableContainer.append("<img src='images/loading.gif' alt='GIF of Chuunibyou Loading' class='loading'>");
                    setTimeout(() => {
                        add(scrollableContainer,initial,count);
                        initial +=5;
                        count+=5;
                    }, 2000);
                }
            }
        }
    });
});
