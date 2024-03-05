function EmitRandomNumber(attempt = 1) {
    console.log(`Attempt #${attempt}. EmitRandomNumber is called.`);
        let num = Math.floor(Math.random() * 100);
        console.log("2 seconds have lapsed");
        if(attempt == 10){
            console.log(`Random Number generated is ${num}`);
            return;
        }
        if (num < 80) {
            console.log(`Random Number generated is ${num}`);
            console.log("-----");
            return EmitRandomNumber(++attempt);
        }
        if (num > 80) {
            console.log(`Random Number generated is ${num}!!!`);
            return;
        }
}

setTimeout(() => {
EmitRandomNumber();
}, 2000);


