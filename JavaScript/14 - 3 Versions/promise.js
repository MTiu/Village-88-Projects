function EmitRandomNumber(attempt = 1) {
    return new Promise((resolve)=>{
        console.log(`Attempt #${attempt}. EmitRandomNumber is called.`);
        let num = Math.floor(Math.random() * 100);
        console.log("2 seconds have lapsed");
        if(attempt == 10){
            resolve(`Random Number generated is ${num}`);
        }
        if (num < 80) {
            console.log(`Random Number generated is ${num}`);
            console.log("-----");
            resolve(EmitRandomNumber(++attempt));
        }
        if (num > 80) {
            resolve(`Random Number generated is ${num}!!!`);
        }
    })

}

setTimeout(() => {
    EmitRandomNumber()
    .then((result) => {
        console.log(result);
    })
}, 2000);


