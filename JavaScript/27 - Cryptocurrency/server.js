const express = require("express");
const session = require("express-session");
const bodyParser = require("body-parser");
const app = express();
const axios = require("axios");

app.use(
    session({
        secret: "mySikretCookie",
        resave: false,
        saveUninitialized: true,
        cookie: { maxAge: 600000 },
    })
);
app.use(express.static(__dirname + "/files"));
app.use(bodyParser.urlencoded({ extended: true }));
app.set("views", __dirname + "/files/views");
app.set("view engine", "ejs");

app.listen(7777);

app.get("/", (req, res) => {
    res.render("index");
});

app.get("/view_finance", (req, res) => {
    res.render("finance");
});

app.get("/view_exchange", (req, res) => {
    res.render("exchange");
});

app.get("/crypto", (req, res) => {
    axios
        .get(
            "https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&sparkline=false&locale=en"
        )
        .then((data) => {
            console.log(data);
            res.json(data.data);
        })
        .catch((error) => {
            console.log(error);
            res.json(error);
        });
});

app.get("/finance", (req, res) => {
    axios
        .get(
            "https://api.coingecko.com/api/v3/asset_platforms"
        )
        .then((data) => {
            console.log(data);
            res.json(data.data);
        })
        .catch((error) => {
            console.log(error);
            res.json(error);
        });
});

app.get("/exchange", (req, res) => {
    axios
        .get(
            "https://api.coingecko.com/api/v3/exchanges"
        )
        .then((data) => {
            console.log(data);
            res.json(data.data);
        })
        .catch((error) => {
            console.log(error);
            res.json(error);
        });
});