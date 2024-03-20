const Express = require("express");
const app = Express();
const bodyParser = require("body-parser");
const Router = require("./system/routes");
const session = require('express-session');

app.listen(7777);

/* Middleware */
app.use(Express.static(__dirname + "/"));
app.use(bodyParser.urlencoded({ extended: true }));
app.use(
    session({
        secret: "SikretKode",
        resave: false,
        saveUninitialized: true,
        cookie: { maxAge: 60000 },
    })
);
app.use("/", Router);

app.set("views", __dirname + "/views");
app.set("view engine", "ejs");
