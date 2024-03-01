class Circles{
    constructor(count, circleClass = "circle"){
        this.count = count;
        this.circleClass = circleClass;
        this.imageClasses = ["spe-circle","suz-circle","tei-circle"];
    }

    create_circles()
    {
        let circle = document.createElement("div");
        circle.classList.add(this.circleClass);
        circle.classList.add(this.imageClasses[Math.floor(Math.random() * 3)]);
        let size = Math.random() * 100;
        circle.style.width =  size +"px";
        circle.style.height = size +"px";
        circle.style.top = Math.random() * 90 + "%";
        circle.style.left = Math.random() * 90 + "%";
        return circle;
    }

    draw_circles(selector){
        for(let i = 0; i<this.count; i++){
            document.querySelector("#"+selector).appendChild(this.create_circles());
        }
    }

    expand(){
        function expander(){
            let circles = document.querySelectorAll(".circle");
            for(let i = 0; i< circles.length; i++){
                circles[i].style.height = parseInt(circles[i].style.height) + 1 + 'px'; 
                circles[i].style.width = parseInt(circles[i].style.width) + 1 + 'px'; 
                if(parseInt(circles[i].style.width) >= 200){
                    circles[i].parentNode.removeChild(circles[i]);
                }
            }
        }
        setInterval(expander,10);
    }
}