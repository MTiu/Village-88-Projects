const express    = require("express");
const app        = express();
const server     = app.listen(7777);
const io         = require("socket.io")(server);

app.use(express.static(__dirname + "/files"));

/* Control for Routes of Directory */
app.set("views", __dirname + "/files/views");
app.set("view engine", "ejs");

/* Control for Routes */
app.get("/", (req, res) => {
    res.render("index");
});

function createDate(){
    const currentDate = new Date();
    const options = { weekday: 'long', hour: 'numeric', minute: 'numeric', hour12: true };
    const formattedDate = currentDate.toLocaleDateString('en-US', options);
    return formattedDate;
}

function processChat(current_chat, chat){
    chat[chat.length] = current_chat;
    return current_chat;
}

function generateGuess(inputString) {
    const characters = inputString.split('');
    const result = characters.map(char => (char !== ' ' && Math.random() < 0.5) ? '_' : char);

    return result.join(' ');
}

let current_users = [];
let users = {};
let chat = [];
let current_chat = '';
let wordToGuess = [
    {name:'Gundam', url:'https://media1.tenor.com/images/f7d09cd1d6f9a53c09a7c8c9aabd4e35/tenor.gif?itemid=9175987'},
    {name:'One Piece',url:'https://media3.giphy.com/media/cpkQpkVFOOoNi/giphy.gif'},
    {name:'Dragon Ball Z',url:'https://giffiles.alphacoders.com/242/2425.gif'},
    {name:'Lycoris Recoil',url:'https://media.tenor.com/TQ0S-_YPw5MAAAAd/lycoris-recoil-chisato.gif'},
    {name:'Bang Dream', url:'https://pa1.narvii.com/6489/7a104ee7f3d00b267196245637e4935712c19342_hq.gif'},
    {name:'Love Live', url:'https://media.tenor.co/images/694927eede67ccf45f2601b9c2aad98b/raw'},
    {name:'Naruto Shippuden', url:'https://giffiles.alphacoders.com/979/9790.gif'},
    {name:'Sousou no Frieren', url:'https://c.tenor.com/34CUcsND-eEAAAAC/tenor.gif'},
    {name:'Your Name', url:'https://i.pinimg.com/originals/03/c0/58/03c0589d1e5ead5d3c692dc63b79b11b.gif'},
    {name:'Oshi no Ko', url:'https://i.pinimg.com/originals/a3/fc/85/a3fc856fe2d12728330cc8379e9fece5.gif'}
];

let current_word = wordToGuess[Math.floor(Math.random() * wordToGuess.length)];
/* Control for Sockets */
io.on("connection", function (socket) {
    if(current_users.length == 0){
        socket.emit("new_user", {
            msg: "Greetings, from server Node, brought to you by Sockets! -Server",
            word: generateGuess(current_word.name),
        }); 
    }else{
        socket.emit("new_user", {
            msg: "Greetings, from server Node, brought to you by Sockets! -Server",
            chat: chat,
            word: generateGuess(current_word.name),
        }); 
    }

    socket.on("notify_all_entered", function(data){
        current_chat = processChat(`<p class = 'joined'><span class = "emphasize">${data.name}</span> with the ID of <span class = "emphasize">${socket.id}</span> Has Joined the Chat! Welcome!</p>`,chat);
        users[socket.id] = data.name;
        current_users = Object.values(users).map(user => `<p>${user}</p>`);
        io.emit("update_users",{
            users: current_users
        })
        io.emit("notify_all_enterDisplay",{
            msg:current_chat,
            users: current_users
        })
    });

    socket.on("chat", function (data) {
        if(data.msg.trim() == ''){
            data.msg = "I'M A FILTHY, STINKY HACKER!";
        }
        let date = createDate();
        current_chat = processChat(`<p>Delivered by <span class = "emphasize">${data.name}</span> on ${date}: <span class = "message">${data.msg}</span></p>`,chat);
        io.emit("chat_display",{
            msg: current_chat
        });

        if(data.msg.toLowerCase() == current_word.name.toLowerCase()){
            let img = `<img src="${current_word.url}" alt="GIF of ${current_word.name}">`;
            current_word = wordToGuess[Math.floor(Math.random() * wordToGuess.length)];
            current_chat = processChat(`<p class = "success">${data.name} Guessed the correct Anime!</p>`,chat);
            processChat(img, chat);
            io.emit("success",{
                msg: current_chat,
                word: generateGuess(current_word.name),
                img: img
            })
        }
    });

    socket.on("disconnect", function(){
        current_chat = processChat(`<p class = "disconnected"> <span class = "emphasize">${users[socket.id]}</span> has disconnected with the id of <span class = "emphasize">${socket.id}</span></p>`,chat);
        io.emit("display_disconnected",{
            msg: current_chat,
        })
        delete users[socket.id];
        current_users = Object.values(users).map(user => `<p>${user}</p>`);
        io.emit("update_users",{
            users: current_users
        })
    })

});

