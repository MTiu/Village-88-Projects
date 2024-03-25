const MainModel = require("../system/MainModel");
/* Model Template */
class Model extends MainModel {
    async fetchCars() {
        return await this.fetchSolo("SELECT * FROM cars where id = ?",[1]);
    }
}

module.exports = new Model();
