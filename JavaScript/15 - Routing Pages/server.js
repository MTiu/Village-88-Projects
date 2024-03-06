const http = require("http");
const fs = require("fs");

const server = http.createServer((request, response) => {
    if (request.url === "/") {
        fs.readFile("welcome.html", "utf8", (errros, contents) => {
            response.writeHead(200, { "Content-Type": "text/html" });
            response.write(contents);
            response.end();
        });
    } else if (request.url === "/village88") {
        fs.readFile("village88.html", "utf8", (errors, contents) => {
            response.writeHead(200, { "Content-Type": "text/html" });
            response.write(contents);
            response.end();
        });
    } else if (request.url === "/training/new") {
        fs.readFile("training.html", "utf8", (errors, contents) => {
            response.writeHead(200, { "Content-Type": "text/html" });
            response.write(contents);
            response.end();
        });
    } else {
        response.end("File not Found!!!");
    }
});

server.listen(7777);

