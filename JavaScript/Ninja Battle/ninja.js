var ninja1 = {
    hp: 100,
    strength: 15,
    attack: function () {
        return Math.floor(Math.random() * this.strength);
    },
};

var ninja2 = {
    hp: 150,
    strength: 10,
    attack: function () {
        return Math.floor(Math.random() * this.strength);
    },
};

for (let i = 1; i <= 10; i++) {
    let damage1 = ninja1.attack();
    let damage2 = ninja2.attack();
    ninja2.hp -= damage1;
    ninja1.hp -= damage2;
    console.log("===Round "+i+"===")
    console.log(
        "Ninja1 attacks Ninja2 and does a damage of " +
            damage1 +
            "! Ninja1 health: " +
            ninja1.hp +
            ". Ninja2 health: " +
            ninja2.hp
    );
    console.log(
        "Ninja2 attacks Ninja1 and does a damage of " +
            damage2 +
            "! Ninja1 health: " +
            ninja1.hp +
            ". Ninja2 health: " +
            ninja2.hp
    );
}

if (ninja1.hp > ninja2.hp) {
    console.log("NINJA1 WINS!!!!!");
} else {
    console.log("NINJA2 WINS!!!!!");
}
