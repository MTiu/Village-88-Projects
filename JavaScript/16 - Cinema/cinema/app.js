const http = require("http");
const fs = require("fs");

server = http.createServer((request, response) => {
    if (request.url === "/movies") {
        fs.readFile("./views/movies.html", "utf8", (error, contents) => {
            response.writeHead(200, { "Content-Type": "text/html" });
            response.write(contents);
            response.end();
        });
    } else if (request.url === "/stylesheets/movie.css") {
        fs.readFile("stylesheets/movie.css", "utf8", (error, contents) => {
            response.writeHead(200, { "Content-Type": "text/css" });
            response.write(contents);
            response.end();
        });
    } else if (request.url === "/images/blackfox.jpg") {
        fs.readFile("images/blackfox.jpg", (error, contents) => {
            response.writeHead(200, { "Content-Type": "image/jpg" });
            response.write(contents);
            response.end();
        });
    } else if (request.url === "/images/weathering.jpg") {
        fs.readFile("images/weathering.jpg", (error, contents) => {
            response.writeHead(200, { "Content-Type": "image/jpg" });
            response.write(contents);
            response.end();
        });
    } else if (request.url === "/images/yourname.jpg") {
        fs.readFile("images/yourname.jpg", (error, contents) => {
            response.writeHead(200, { "Content-Type": "image/jpg" });
            response.write(contents);
            response.end();
        });
    } else if (request.url === "/theaters") {
        fs.readFile("./views/theaters.html", (error, contents) => {
            response.writeHead(200, { "Content-Type": "text/html" });
            response.write(contents);
            response.end();
        });
    } else if (request.url === "/stylesheets/theater.css") {
        fs.readFile("stylesheets/theater.css", "utf8", (error, contents) => {
            response.writeHead(200, { "Content-Type": "text/css" });
            response.write(contents);
            response.end();
        });
    } else if (request.url === "/images/sm.jpg") {
        fs.readFile("images/sm.jpg", (error, contents) => {
            response.writeHead(200, { "Content-Type": "image/jpg" });
            response.write(contents);
            response.end();
        });
    } else if (request.url === "/images/inner-cinema.jpg") {
        fs.readFile("images/inner-cinema.jpg", (error, contents) => {
            response.writeHead(200, { "Content-Type": "image/jpg" });
            response.write(contents);
            response.end();
        });
    } else if (request.url === "/movies/new") {
        fs.readFile("./views/new.html", (error, contents) => {
            response.writeHead(200, { "Content-Type": "text/html" });
            response.write(contents);
            response.end();
        });
    } else if (request.url === "/stylesheets/add.css") {
        fs.readFile("stylesheets/add.css", "utf8", (error, contents) => {
            response.writeHead(200, { "Content-Type": "text/css" });
            response.write(contents);
            response.end();
        });
    } else {
        response.end("FILE NOT FOUND!!");
    }
});

server.listen(7777);
