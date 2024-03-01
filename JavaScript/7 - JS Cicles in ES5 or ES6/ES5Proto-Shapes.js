function shapes(){
    this.buttons = document.getElementsByClassName("selection");

    shapes.prototype.createShapes = function(mouseX, mouseY, size){
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

    shapes.prototype.initMain = function(){
        var shapes = this;
        document.getElementsByTagName("main")[0].addEventListener("click", function (event) {
            var mouseX = event.clientX - 80;
            var mouseY = event.clientY - 200;
            var size = Math.floor(Math.random() * 200) + 100;
            shapes.createShapes(mouseX,mouseY,size);
        });
    };

    shapes.prototype.reset = function(){
        document.getElementsByClassName("reset")[0].addEventListener("click", function(){
            document.getElementsByClassName("active")[0].classList.remove("active");
            var circles = document.getElementsByClassName("circle");
    
            for (var i = circles.length - 1; i >= 0; i--) {
                circles[i].parentNode.removeChild(circles[i]);
            }
        });
    };

    shapes.prototype.shrink = function(){
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

    shapes.prototype.initButton = function(){
        for (var i = 0; i < this.buttons.length; i++){
            (function(index) {
                var shapes = this;
                shapes.buttons[index].addEventListener("click", function(){
                    var active_button = document.getElementsByClassName("active")[0];
                    if(active_button){
                        active_button.classList.remove("active");
                    }
                    shapes.buttons[index].classList.add("active");
                });
            }).call(this, i);
        }
    }
}

var circle = new shapes();
document.addEventListener("DOMContentLoaded", function () {

    circle.initMain();
    circle.reset();
    circle.shrink();
    circle.initButton();
    
});
