class Enemy {
    constructor(x, y, AGI) {
        this.x = x;
        this.y = y;
        this.AGI = AGI;
    }
}

class Ghost extends Enemy{
    constructor(x,y,AGI=5,hp=1,img='/images/enemy1.gif'){
        super(x,y,AGI)
        this.hp = hp
        this.img = $("<img>")
        .attr({
            src: img,
            alt: "Image of Ghost",
            class: "enemy",
        })
        .css("left", this.x)
        .css("top", this.y);
    $("main").append(this.img);
    }
}