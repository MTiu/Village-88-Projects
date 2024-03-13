const music = new Audio("/sounds/xDeviruchi - The Icy Cave (Loop).wav");
music.volume = 0.1;
music.addEventListener("ended",()=> {
    music.currentTime = 0;
    music.play();
});
