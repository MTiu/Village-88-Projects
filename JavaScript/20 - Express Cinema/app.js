const express = require("express");
const app = express();

app.listen(7777, ()=>{
    console.log("Listening!")
})

app.use(express.static(__dirname + "/static"));
