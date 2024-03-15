class Player {
    constructor(
        id,
        x = 100,
        y = 100,
        name = "player",
        hp = 3,
        specialProj = 3
    ) {
        this.id = id;
        this.name = name;
        this.hp = hp;
        this.x = x;
        this.y = y;
        this.specialProj = specialProj;
    }
    createPlayer() {
        const playerDiv = $("<div>")
            .addClass("player")
            .attr("id", this.id)
            .css("left", this.x)
            .css("top", this.y);

        const playerName = $("<p>").text(this.name);

        const playerImage = $("<img>").attr({
            src: "images/witch.gif",
            alt: `Image of ${this.name}`,
        });

        playerDiv.append(playerName, playerImage);

        $("main").append(playerDiv);
    }
    removePlayer() {
        $(`#${this.id}`).remove();
    }
    move() {
        $(`#${this.id}`).css("left", this.x).css("top", this.y);
    }
}
