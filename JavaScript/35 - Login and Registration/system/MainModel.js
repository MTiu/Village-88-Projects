const mysql = require("mysql2/promise");
const dbConfig = require("../config/config");

class MainModel {
    /* Use to Initialize the Database Connection */
    async initDatabase() {
        try {
            this.connection = await mysql.createConnection(dbConfig);
        } catch (error) {
            console.log("ERROR");
            throw error;
        }
    }
    /* Use to Fetch SELECT Queries for multiple rows */
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
    /* Use to Fetch SELECT Queries for single row */
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
    /* Use to Execute UPDATE, DELETE, INSERT Queries */
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

