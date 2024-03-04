class Bands {
    // bandMemberImages = [];
    // backgroundImage = "";
    // bandSong = "";
    // songDisplay = "";
    constructor(shape) {
        this.shape = shape;
    }

    create_band(mouseX, mouseY, size) {
        document.querySelector("#song").innerHTML = this.songDisplay;
        document.querySelector("body").style.backgroundImage =
            "url('img/" + this.backgroundImage + "')";
        let band = document.createElement("img");
        band.classList.add(this.shape);
        band.src =
            "img/" + this.bandMemberImages[Math.floor(Math.random() * 5)];
        band.style.position = "absolute";
        band.style.left = mouseX + "px";
        band.style.top = mouseY + "px";
        band.style.height = size + "px";
        band.style.width = size + "px";
        return band;
    }
}

class Popipa extends Bands {
    bandMemberImages = [
        "arisa.jpg",
        "tae.jpg",
        "kasumi.jpg",
        "saya.jpg",
        "rimi.jpg",
    ];
    backgroundImage = "Popipa.jpg";
    bandSong = "tokimeki.m4a"
    songDisplay = "Now Playing: Tokimeki Experience/ときめきエクスペリエンス."
    constructor(shape) {
        super(shape);
    }
}

class Roselia extends Bands {
    bandMemberImages = [
        "yukina.jpg",
        "sayo.jpg",
        "lisa.jpg",
        "ako.jpg",
        "rinko.jpg",
    ];
    backgroundImage = "Roselia.jpg";
    bandSong = "neoAspect.m4a"
    songDisplay = "Now Playing: Neo Aspect"
    constructor(shape) {
        super(shape);
    }
}

class RAS extends Bands {
    bandMemberImages = [
        "layer.jpg",
        "lock.jpg",
        "masking.jpg",
        "pareo.jpg",
        "chu2.jpg",
    ];
    backgroundImage = "RAS.jpg";
    bandSong = "sacred.m4a"
    songDisplay = "Now Playing: Sacred World"
    constructor(shape) {
        super(shape);
    }
}

class Morfonica extends Bands {
    bandMemberImages = [
        "mashiro.jpg",
        "touko.jpg",
        "nanami.jpg",
        "tsukushi.jpg",
        "rui.jpg",
    ];
    backgroundImage = "Morfonica.jpg";
    bandSong = "daylight.m4a"
    songDisplay = "Now Playing: Daylight/デイライト"
    constructor(shape) {
        super(shape);
    }
}

class Afterglow extends Bands {
    bandMemberImages = [
        "ran.jpg",
        "moca.jpg",
        "himari.jpg",
        "tomoe.jpg",
        "tsugumi.jpg",
    ];
    backgroundImage = "Afterglow.jpg";
    bandSong = "sasanqua.m4a"
    songDisplay = "Now Playing: Sasanqua"
    constructor(shape) {
        super(shape);
    }
}

class HelloHappy extends Bands {
    bandMemberImages = [
        "kokoro.jpg",
        "kaoru.jpg",
        "hagumi.jpg",
        "kanon.jpg",
        "michelle.jpg",
    ];
    backgroundImage = "HelloHappy.jpg";
    bandSong = "kimi.m4a"
    songDisplay = "Now Playing: I need you!/キミがいなくちゃっ！"
    constructor(shape) {
        super(shape);
    }
}

class Pastel extends Bands {
    bandMemberImages = [
        "aya.jpg",
        "hina.jpg",
        "chisato.jpg",
        "maya.jpg",
        "eve.jpg",
    ];
    backgroundImage = "Pastel.jpg";
    bandSong = "yura.m4a"
    songDisplay = "Now Playing: ゆら・ゆらRing-Dong-Dance"
    constructor(shape) {
        super(shape);
    }
}

class Mygo extends Bands {
    bandMemberImages = [
        "tomori.jpg",
        "soyo.jpg",
        "anon.jpg",
        "taki.jpg",
        "rana.jpg",
    ];
    backgroundImage = "Mygo.jpg";
    bandSong = "mayoi.m4a"
    songDisplay = "Now Playing: 迷星叫/Mayoi Uta"
    constructor(shape) {
        super(shape);
    }
}

class Ave extends Bands {
    bandMemberImages = [
        "doloris.jpg",
        "mortis.jpg",
        "timoris.jpg",
        "amoris.jpg",
        "oblivionis.jpg",
    ];
    backgroundImage = "Ave.jpg";
    bandSong = "ave.m4a"
    songDisplay = "Now Playing: Ave Mujica"
    constructor(shape) {
        super(shape);
    }
}

function shrink() {
    const images = document.querySelectorAll("img");

    for (let i = 0; i < images.length; i++) {
        images[i].style.height = parseInt(images[i].style.height) - 1 + "px";
        images[i].style.width = parseInt(images[i].style.width) - 1 + "px";
        if (parseInt(images[i].style.width) <= 0) {
            images[i].parentNode.removeChild(images[i]);
        }
    }
}

function update(active_band, shape){
    if (active_band == "popipa") {
        return new Popipa(shape);
    } else if(active_band == "roselia") {
        return new Roselia(shape);
    } else if(active_band == "ras") {
        return new RAS(shape);
    } else if(active_band == "morfonica") {
        return new Morfonica(shape);
    } else if(active_band == "afterglow") {
        return new Afterglow(shape);
    } else if(active_band == "hello-happy") {
        return new HelloHappy(shape);
    } else if(active_band == "paspare") {
        return new Pastel(shape);
    } else if(active_band == "mygo") {
        return new Mygo(shape);
    } else if(active_band == "ave") {
        return new Ave(shape);
    }
}

document.addEventListener("DOMContentLoaded", function () {
    let active_band = "popipa";
    let shape = 'star';
    let bandCreator = new Popipa(shape);
    const buttons = document.querySelectorAll(".selection");
    const audio = new Audio('song/'+ bandCreator.bandSong);

    for (let i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener("click", function () {
            const active_button = document.querySelector(".active");
            if (active_button) {
                active_button.classList.remove("active");
            }
            buttons[i].classList.add("active");
            shape = buttons[i].classList[1];
            bandCreator = update(active_band, shape);
        });
    }

    document.querySelector("#bands").addEventListener("change", function () {
        active_band = document.querySelector("#bands").value;
        bandCreator = update(active_band, shape);
    });

    document.querySelector("main").addEventListener("click", function (event) {

        const mouseX = event.clientX - 80;
        const mouseY = event.clientY - 200;
        const size = Math.floor(Math.random() * 200) + 200;
        let band;

        band = bandCreator.create_band(mouseX, mouseY, size);

        const audioFileName = audio.src.split('/').pop();

        if (audioFileName !== bandCreator.bandSong) {
            audio.src = 'song/' + bandCreator.bandSong;
            audio.load(); 
            audio.play();
        } else {
            if (audio.paused) {
                audio.play();
            }
        }

        if (band) {
            document.querySelector("main").appendChild(band);
        }
    });

    document.querySelector(".reset").addEventListener("click", function () {
        document.querySelector("#bands").value = "popipa";
        document.querySelector("body").style.backgroundImage = "url('img/bandori.jpg')";
        document.querySelector("#song").innerHTML="";
        const active_button = document.querySelector(".active");
        if (active_button) {
            active_button.classList.remove("active");
        }
        document.querySelector(".star").classList.add('active');
        active_band = "popipa";
        shape = 'star';
        bandCreator = new Popipa(shape);
        audio.currentTime = 0;
        audio.pause();
        const images = document.querySelectorAll("img");
        for (let i = images.length - 1; i >= 0; i--) {
            images[i].parentNode.removeChild(images[i]);
        }
    });
    setInterval(shrink, 10);
});
