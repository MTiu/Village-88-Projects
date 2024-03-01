class shapes{
    constructor(){
        this.buttons = document.getElementsByClassName("selection");
    }

    createShapes(mouseX, mouseY, size){
        const circle = document.createElement("div");
    
        const active_button = document.getElementsByClassName('active')[0];
        if(active_button){
            circle.classList.add(active_button.value, 'circle');
        }

        circle.style.left = mouseX + "px";
        circle.style.top = mouseY + "px";
        circle.style.height = size + "px";
        circle.style.width = size + "px";

        document.getElementsByTagName("main")[0].appendChild(circle);
    }

    initMain(){
        const shapes = this;
        document.getElementsByTagName("main")[0].addEventListener("click", function (event) {
            const mouseX = event.clientX - 80;
            const mouseY = event.clientY - 200;
            const size = Math.floor(Math.random() * 200) + 100;
            shapes.createShapes(mouseX,mouseY,size);
        });
    };

    reset(){
        document.getElementsByClassName("reset")[0].addEventListener("click", function(){
            document.getElementsByClassName("active")[0].classList.remove("active");
            const circles = document.getElementsByClassName("circle");
    
            for (let i = circles.length - 1; i >= 0; i--) {
                circles[i].parentNode.removeChild(circles[i]);
            }
        });
    };

    shrink(){
        function shrinker(){
            const circles = document.getElementsByClassName("circle");
            for(let i = 0; i< circles.length; i++){
                circles[i].style.height = parseInt(circles[i].style.height) - 1 + 'px'; 
                circles[i].style.width = parseInt(circles[i].style.width) - 1 + 'px'; 
                if(parseInt(circles[i].style.width) <= 0){
                    circles[i].parentNode.removeChild(circles[i]);
                }
            }
        }
        setInterval(shrinker,10);
    };

    initButton(){
        for (let i = 0; i< this.buttons.length; i++){
            const shapes = this;
            shapes.buttons[i].addEventListener("click", function(){
                const active_button = document.getElementsByClassName("active")[0];
                if(active_button){
                    active_button.classList.remove("active");
                }
                shapes.buttons[i].classList.add("active");
            });
        }
    }
}

let circle = new shapes();
document.addEventListener("DOMContentLoaded", function () {

    circle.initMain();
    circle.reset();
    circle.shrink();
    circle.initButton();
    
});
