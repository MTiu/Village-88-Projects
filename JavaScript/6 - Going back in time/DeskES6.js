class Desk{
    constructor(name,x=0,y=0,color="black"){
        this.name = name;
        this.x = x;
        this.y = y;
        this.color = color;
    }

    mov(x, y) {
        this.x = x;
        this.y = y;
    };

    updateColor(new_color) {
        this.color = new_color;
    };
}

let desk1 = new Desk("oak desk");
let desk2 = new Desk("maple desk");
desk1.updateColor("brown");
console.log(desk1);
console.log(desk2);

