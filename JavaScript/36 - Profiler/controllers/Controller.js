const Model = require('../models/Model');

/* Controller Template */
class Controller {
    async index(req, res) {
        const cars = await Model.fetchCars();
        res.render("index",{data: cars, session_data: ++req.session.num});
    }

    async process(req, res){
        const cars = await Model.execQuery("SELECT * FROM cars WHERE id = ?",[2]);
        res.send('HELLO');
    }
}

module.exports = new Controller();
