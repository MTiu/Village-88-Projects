const Express = require("express");
const Router = Express.Router();
const Controller = require("../controllers/Controller");

/* Put your Routes Here! */
Router.get("/", Controller.index);
Router.post("/process", Controller.process);
module.exports = Router;
