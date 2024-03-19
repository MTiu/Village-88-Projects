const Express = require("express");
const Router = Express.Router();
const CarsController = require("./controllers/CarsController");

/* Put your Routes Here! */
Router.get("/", CarsController.index);
Router.get("/process", CarsController.process);
module.exports = Router;
