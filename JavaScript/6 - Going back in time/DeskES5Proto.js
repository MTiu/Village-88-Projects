function Desk(name,x = 0,y = 0, color = "black") {
    this.name = name;
    this.x = x;
    this.y = y;
    this.color = color;

    Desk.prototype.mov = function (x, y) {
        this.x = x;
        this.y = y;
    };

    Desk.prototype.updateColor = function (new_color) {
        this.color = new_color;
    };
}

var desk1 = new Desk("oak desk");
var desk2 = new Desk("maple desk");
desk1.updateColor("brown");
console.log(desk1);
console.log(desk2);

