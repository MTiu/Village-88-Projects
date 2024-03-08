var express = require("express");
var session = require("express-session");
var bodyParser = require("body-parser");
var app = express();

app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static(__dirname + "/static"));
app.use(
    session({
        secret: "user",
        resave: false,
        saveUninitialized: true,
        cookie: { maxAge: 60000 },
    })
);

/** MYSQL Connection **/
const Mysql = require("mysql2");
var connection = Mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "debug_express",
    port: 3306,
});
connection.connect(function (err) {
    if (err) throw err;
});

app.set("views", __dirname + "/views");
app.set("view engine", "ejs");

app.get("/", function (req, res) {
    res.render("index");
});

app.post("/login", function (req, res) {
    function myPromise(){
    return new Promise((resolve, reject) => {
        let email = req.body["email"];
        let password = req.body["password"];
        let get_user_query = Mysql.format(
            `
            SELECT users.id, users.first_name, users.email, users.password
            FROM users
            WHERE users.email = ? AND users.password = ? LIMIT 1;`,
            [email, password]
        );
        resolve(get_user_query);
    }

    )};
    (async () => {
        console.log("STEP 1");
        const users = await myPromise();
        const query = await (() => {
            return new Promise((resolve, reject) => {
                connection.query(users, function (err, result) {
                    resolve(result);
                });
            });
        })();
        console.log("STEP 2",query);
        console.log("STEP 3");
        res.redirect("/");
    })();

});

app.listen(8000, function () {
    console.log("Listening on port: 8000");
});
