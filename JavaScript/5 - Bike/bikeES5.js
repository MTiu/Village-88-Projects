function Bike(price, max_speed, miles=0){

        this.price = price;
        this.max_speed = max_speed;
        this.miles = miles;

    this.displayinfo = function(){
        console.log("Price is "+this.price);
        console.log("Maximum Speed is "+this.max_speed);
        console.log("Miles is "+this.miles);
    }

    this.drive = function(){
        console.log("Driving");
        this.miles+= 10;
    }

    this.reverse = function(){
        console.log("Reversing");
        if(this.miles < 0){
            this.miles-= 5;
        } else {
            console.log("Can't Reverse!");
        }
    }
}

let bike1 = new Bike(10, 10);
let bike2 = new Bike(10, 20);
let bike3 = new Bike(10, 30);


bike1.drive();
bike1.drive();
bike1.drive();
bike1.reverse();
bike1.displayinfo();

bike2.drive();
bike2.drive();
bike2.reverse();
bike2.reverse();
bike2.displayinfo();

bike3.reverse();
bike3.reverse();
bike3.reverse();
bike3.displayinfo();