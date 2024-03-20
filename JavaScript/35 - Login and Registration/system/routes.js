const Express = require("express");
const Router = Express.Router();
const Controller = require("../controllers/UserController");

/* Put your Routes Here! */
Router.get("/", Controller.index);
Router.post("/logProcess", Controller.logProcess);
Router.post("/regProcess", Controller.regProcess);
Router.get("/students/profile", Controller.profile);
Router.get("/logOut", Controller.logOut);
module.exports = Router;
