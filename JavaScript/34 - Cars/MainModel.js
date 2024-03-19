const mysql = require("mysql2/promise");
const dbConfig = require("../34 - Cars/config");

class MainModel {

    async initDatabase() {
        try {
            this.connection = await mysql.createConnection(dbConfig);
        } catch (error) {
            console.log("ERROR");
            throw error;
        }
    }

    async fetchAll(query) {
        await this.initDatabase();
        try {
            const [rows] = await this.connection.query(query);
            await this.connection.end();
            return rows;
        } catch (error) {
            console.log("Error in query!!", error);
            throw error;
        }
    }

    async fetchSolo(query){
        await this.initDatabase();
        try {
            const [rows] = await this.connection.query(query);
            await this.connection.end();
            return rows[0];
        } catch (error) {
            console.log("Error in query!!", error);
            throw error;
        }
    }

    async execQuery(query){
        await this.initDatabase();
        try {
            await this.connection.query(query);
            await this.connection.end();
            return "Successful Query!";
        } catch (error) {
            console.log("Error in query!!", error);
            throw error;
        }
    }
}

module.exports = MainModel;

