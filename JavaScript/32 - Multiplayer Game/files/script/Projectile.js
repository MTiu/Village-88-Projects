class Projectile {
    constructor(x, y) {
        this.x = x;
        this.y = y;
    }
}

class Fireball extends Projectile {
    constructor(x, y, playerID, img = "/images/fireball.gif") {
        super(x, y);
        this.playerID = playerID;
        this.img = $("<img>")
            .attr({
                src: img,
                alt: "Image of Fireball",
                class: "projectile",
            })
            .css("left", this.x)
            .css("top", this.y);
        $("main").append(this.img);
    }
}

class Special extends Projectile {
    constructor(
        x,
        y,
        velocity = 2,
        img = "<img src='/images/fireball.gif' alt='Image of Fireball'>"
    ) {
        super(x, y, velocity);
        this.img = img;
    }
}
