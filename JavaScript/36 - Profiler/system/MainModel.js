const mysql = require("mysql2/promise");
const dbConfig = require("../config/dbConfig");
const fs = require('fs');

class MainModel {
    constructor() {
        this.queryLogFile = `${__dirname}../../logs/queryLog.txt`;
    }

    saveQuery(query,value = []){
        let actualQuery = query;
        for (let i = 0; i < value.length; i++) {
            actualQuery = actualQuery.replace('?', value[i]);
        }
        fs.writeFileSync(this.queryLogFile, `${actualQuery}\n`);
    }

    /* Use to Initialize the Database Connection */
    async initDatabase() {
        try {
            this.connection = await mysql.createConnection(dbConfig);
        } catch (error) {
            console.log("Can't Connect to Database");
            throw error;
        }
    }
    /* Use to Fetch SELECT Queries for multiple rows */
    async fetchAll(query,value) {
        await this.initDatabase();
        try {
            let rows;
            if(value){
                [rows] = await this.connection.execute(query,value);
                this.saveQuery(query,value)
            } else {
                [rows] = await this.connection.query(query);
                this.saveQuery(query)
            }
            await this.connection.end();
            return rows;
        } catch (error) {
            console.log("Error in query!!", error);
            throw error;
        }
    }
    /* Use to Fetch SELECT Queries for single row */
    async fetchSolo(query, value){
        await this.initDatabase();
        try {
            let rows;
            if(value){
                [rows] = await this.connection.execute(query,value);
                this.saveQuery(query,value)
            } else {
                [rows] = await this.connection.query(query);
                this.saveQuery(query)
            }
            await this.connection.end();
            return rows[0];
        } catch (error) {
            console.log("Error in query!!", error);
            throw error;
        }
    }
    /* Use to Execute UPDATE, DELETE, INSERT Queries */
    async execQuery(query, value){
        await this.initDatabase();
        try {
            if(value){
                await this.connection.execute(query, value);
                this.saveQuery(query, value)
            } else {
                await this.connection.query(query);
                this.saveQuery(query)
            }
            await this.connection.end();
            return "Successful Query!";
        } catch (error) {
            console.log("Error in query!!", error);
            throw error;
        }
    }
}

module.exports = MainModel;

