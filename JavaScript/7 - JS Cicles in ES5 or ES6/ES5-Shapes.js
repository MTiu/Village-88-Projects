function Circles(){
    this.buttons = document.getElementsByClassName("selection");

    this.createShapes = function(mouseX, mouseY, size){
        var circle = document.createElement("div");
    
        var active_button = document.getElementsByClassName('active')[0];
        if(active_button){
            circle.classList.add(active_button.value, 'circle');
        }

        circle.style.left = mouseX + "px";
        circle.style.top = mouseY + "px";
        circle.style.height = size + "px";
        circle.style.width = size + "px";

        document.getElementsByTagName("main")[0].appendChild(circle);
    }

    this.initMain = function(){
        var circles = this;
        document.getElementsByTagName("main")[0].addEventListener("click", function (event) {
            var mouseX = event.clientX - 80;
            var mouseY = event.clientY - 200;
            var size = Math.floor(Math.random() * 200) + 100;
            circles.createShapes(mouseX,mouseY,size);
        });
    };

    this.reset = function(){
        document.getElementsByClassName("reset")[0].addEventListener("click", function(){
            document.getElementsByClassName("active")[0].classList.remove("active");
            var circles = document.getElementsByClassName("circle");
    
            for (var i = circles.length - 1; i >= 0; i--) {
                circles[i].parentNode.removeChild(circles[i]);
            }
        });
    };

    this.shrink = function(){
        function shrinker(){
            var circles = document.getElementsByClassName("circle");
            for(var i = 0; i< circles.length; i++){
                circles[i].style.height = parseInt(circles[i].style.height) - 1 + 'px'; 
                circles[i].style.width = parseInt(circles[i].style.width) - 1 + 'px'; 
                if(parseInt(circles[i].style.width) <= 0){
                    circles[i].parentNode.removeChild(circles[i]);
                }
            }
        }
        setInterval(shrinker,10);
    };

    this.initButton = function(){
        for (var i = 0; i < this.buttons.length; i++){
            (function(index) {
                var circles = this;
                circles.buttons[index].addEventListener("click", function(){
                    var active_button = document.getElementsByClassName("active")[0];
                    if(active_button){
                        active_button.classList.remove("active");
                    }
                    circles.buttons[index].classList.add("active");
                });
            }).call(this, i);
        }
    }
}

var circle = new Circles();
document.addEventListener("DOMContentLoaded", function () {

    circle.initMain();
    circle.reset();
    circle.shrink();
    circle.initButton();
    
});
