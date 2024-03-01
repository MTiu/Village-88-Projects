function reject(arr, func){
    arr2 = [];
    counter = 0;
    for(let i = 0; i<arr.length; i++){
        if(!(func(arr[i]))){
            arr2[counter] = arr[i];
            counter++;
        }
    }
    return arr2;
}

/*1*/
let result = reject([1,2,3,4,15], function(val) { return val<10; }); //rejects any value that is less than 10
console.log(result); //this should log [15]

/*2*/
result = reject([1,2,3,4,15], function(val) { return val<3; }); //rejects any value that is less than 3
console.log(result); //this should log [3,4,15]