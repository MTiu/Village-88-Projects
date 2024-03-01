class Circles {
    constructor() {
        this.buttons = document.getElementsByClassName("selection");
    }

    createCircle(mouseX, mouseY, size) {
        const circle = document.createElement("div");

        const activeButton = document.getElementsByClassName('active')[0];
        if (activeButton) {
            circle.classList.add(activeButton.value, 'circle');
        }

        circle.style.left = mouseX + "px";
        circle.style.top = mouseY + "px";
        circle.style.height = size + "px";
        circle.style.width = size + "px";

        document.getElementsByTagName("main")[0].appendChild(circle);
    }

    initMain() {
        const circles = this;
        document.getElementsByTagName("main")[0].addEventListener("click", function (event) {
            const mouseX = event.clientX - 80;
            const mouseY = event.clientY - 200;
            const size = Math.floor(Math.random() * 200) + 100;
            circles.createCircle(mouseX, mouseY, size);
        });
    };

    reset() {
        document.getElementsByClassName("reset")[0].addEventListener("click", function () {
            document.getElementsByClassName("active")[0].classList.remove("active");
            const circles = document.getElementsByClassName("circle");

            for (let i = circles.length - 1; i >= 0; i--) {
                circles[i].parentNode.removeChild(circles[i]);
            }
        });
    };

    shrink() {
        function shrinker() {
            const circles = document.getElementsByClassName("circle");
            for (let i = 0; i < circles.length; i++) {
                circles[i].style.height = parseInt(circles[i].style.height) - 1 + 'px';
                circles[i].style.width = parseInt(circles[i].style.width) - 1 + 'px';
                if (parseInt(circles[i].style.width) <= 0) {
                    circles[i].parentNode.removeChild(circles[i]);
                }
            }
        }

        setInterval(shrinker, 10);
    };

    initButton() {
        for (let i = 0; i < this.buttons.length; i++) {
            const circles = this;
            circles.buttons[i].addEventListener("click", function () {
                const activeButton = document.getElementsByClassName("active")[0];
                if (activeButton) {
                    activeButton.classList.remove("active");
                }
                circles.buttons[i].classList.add("active");
            });
        }
    }
}

let circle = new Circles();
document.addEventListener("DOMContentLoaded", function () {
    console.log(circle);
    circle.initMain();
    circle.reset();
    circle.shrink();
    circle.initButton();
});
