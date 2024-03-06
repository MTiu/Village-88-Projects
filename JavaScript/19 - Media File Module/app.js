const http = require("http");
const static_contents = require('./static.js');

server = http.createServer((request, response) => {
    static_contents(request, response);
});

server.listen(7777);
