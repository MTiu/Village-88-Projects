const Express = require("express");
const app = Express();
const bodyParser = require("body-parser");
const Router = require("./system/routes");
const session = require('express-session');
const sessionConfig = require('./config/sessionConfig');
const profiler = require('./system/profiler');

app.listen(7777);

/* Middleware */
app.use(Express.static(__dirname + "/"));
app.use(bodyParser.urlencoded({ extended: true }));
app.use(
    session(sessionConfig)
);
app.use(profiler);
app.use(Router);

app.set("views", __dirname + "/views");
app.set("view engine", "ejs");
