function hello(func){
    func();
};

hello(()=> console.log('hello'));

function returnFunc(){
    return function(){
        console.log('HELLO!!!');
    }
}

let returner = returnFunc();
returner();

function third(func1, func2){
    let determiner = Math.floor(Math.random() * 2);
    if(determiner == 1){
        func1();
    } else {
        func2();
    }
}

third(
    ()=>console.log("I'm func1"),
    ()=>console.log("I'm func2")
);