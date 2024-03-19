const CarsModel = require('../models/CarsModel');

class Car {
    async index(req, res) {
        const cars = await CarsModel.fetchCars();

        if(!req.session.num)
        req.session.num = 0

        res.render("index",{data: cars, session_data: ++req.session.num});
    }

    process(req, res){
        req.session.num = 0;
        res.redirect('/');
    }
}

module.exports = new Car();
