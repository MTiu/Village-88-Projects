class Projectile {
    constructor(x, y, velocity) {
        this.x = x;
        this.y = y;
        this.velocity = velocity;
    }
}

class Fireball extends Projectile {
    constructor(x, y, playerID, velocity = 5, img = "/images/fireball.gif",dmg=2) {
        super(x, y, velocity);
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
        this.dmg = dmg;
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
