const fs = require("fs");

module.exports = function(request,response){
    
    const requestFile = request.url.split("/").pop();
    const fileType = requestFile.split(".").pop();

    if (request.url === "/") {
        fs.readFile("views/index.html", "utf8", function (errors, contents) {
            response.writeHead(200, { "Content-Type": "text/html" });
            response.write(contents);
            response.end();
        });
    } else if (fileType === "html") {
        fs.readFile("views/" + requestFile, "utf8", (errors, contents) => {
            response.writeHead(200, { "Content-Type": "text/html" });
            response.write(contents);
            response.end();
        });
    } else if (fileType === "css") {
        fs.readFile(
            "stylesheets/" + requestFile,
            "utf8",
            (errors, contents) => {
                response.writeHead(200, { "Content-Type": "text/css" });
                response.write(contents);
                response.end();
            }
        );
    } else if (fileType === "jpg") {
        fs.readFile("images/" + requestFile, (errors, contents) => {
            response.writeHead(200, { "Content-Type": "image/"+fileType });
            response.write(contents);
            response.end();
        });
    } else {
        response.end("FILE NOT FOUND!!");
    }
}