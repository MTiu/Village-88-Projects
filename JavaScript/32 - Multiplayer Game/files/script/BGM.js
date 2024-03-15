const music = new Audio("/sounds/xDeviruchi - The Icy Cave (Loop).wav");
music.volume = 0.1;
music.addEventListener("ended",()=> {
    music.currentTime = 0;
    music.play();
});


// Fireball SFX
const fireballSFX    = new Audio("/sounds/fireball start.wav");
fireballSFX.playbackRate = 3;
fireballSFX.volume = 0.05;

const enemy_deathSFX = new Audio("/sounds/mutantdie.wav");
enemy_deathSFX.volume = 0.05;

const player_deathSFX = new Audio("/sounds/8-bit-falling-down-impact.wav");
player_deathSFX.volume = 0.2;