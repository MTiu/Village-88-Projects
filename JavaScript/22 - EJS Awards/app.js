const express = require("express");
const app = express();

app.listen(7777, () => {
    console.log("Listening!");
});

app.use(express.static(__dirname + "/files"));
app.set("views", __dirname + "/files/views");
app.set("view engine", "ejs");

const awardArr = [
    {
        name: "PHP Certificate",
        img: "images/php.png",
        url: "/php",
    },
    {
        name: "Web Fundamentals Certificate",
        img: "images/web.png",
        url: "/web-fundamentals",
    },
];

const phpObj = {
    name:awardArr[0].name,
    img:awardArr[0].img,
    date: 'February 9, 2024',
    presenter:'Karen',
    technologies:['PHP','CodeIgniter','Ajax','JQuery','MySQL']
}

const webObj = {
    name:awardArr[1].name,
    img:awardArr[1].img,
    date: 'January 16, 2024',
    presenter:'Karen',
    technologies:['HTML','CSS','JavaScript','JQuery','MySQL']
}

app.get("/awards", (req, res) => {
    res.render("awards", { awards: awardArr });
});

app.get("/web-fundamentals", (req, res) => {
    res.render("details", {details: phpObj});
});

app.get("/php", (req, res) => {
    res.render("details", {details: webObj});
});
