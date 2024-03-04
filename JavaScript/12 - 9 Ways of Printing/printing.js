// 1st way

let print_str = function(text){
    console.log(text);
}

print_str("I love Javascript!!!"); 

// 2nd way

(print_str2 = function(text = "I love Javascript!!!"){
    console.log(text);
})();

// 3rd way calling the IIFE

print_str2();

// 4th way

((text = "I love Javascript!!!") => console.log(text))();

//5th way

print_str3 = (text = "I love Javascript!!!") => console.log(text);

print_str3();

//6th way ES6

class logJava{

    print2 = (text = "I love Javascript!!!") => console.log(text); // Not recommended but since it's not using the this and only logging I think it's fine
    print(text){
        console.log(text);
    }
}

let java = new logJava();
java.print("I love Javascript!!!");

// 7th way
java.print2();

//8th way ES5

function logJava2(){
    this.print2 = (text = "I love Javascript!!!") => console.log(text);
    this.print = function(text){
        console.log(text);
    }
}

var java2 = new logJava2();
java2.print2();

//9th with the regular function

java2.print("I love Javascript!!!");

