const express = require("express");
const app = express();

app.listen(7777, ()=>{
    console.log("Listening!")
})

app.use(express.static(__dirname + "/files"));
app.set('views', __dirname + '/files/views');
app.set('view engine','ejs');

app.get('/',(req,res)=>{
    res.render('index');
});
// Not Sure if this is allowed but in the chances that it isn't the code below this dynamic get code should be used instead!
app.get('/:page',(req,res)=>{
    const page = req.params.page;
    res.render(page);
})

// app.get('/movies',(req,res)=>{
//     res.render('movies');
// });

// app.get('/theaters',(req,res)=>{
//     res.render('theaters');
// });

// app.get('/form',(req,res)=>{
//     res.render('form');
// });