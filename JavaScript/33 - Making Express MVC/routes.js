const Express = require("express");
const Router = Express.Router();
const UserController = require(`./controllers/UserController`);

/* Put your Routes Here! */
Router.get("/", UserController.index);
Router.get("/result", UserController.results);

Router.post("/process", UserController.process);


module.exports = Router;
