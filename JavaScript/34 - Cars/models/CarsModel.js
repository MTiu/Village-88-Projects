const MainModel = require("../MainModel");

class CarsModel extends MainModel {
    async fetchCars() {
        return await this.fetchAll("SELECT * FROM cars");
    }
}

module.exports = new CarsModel();
