class Note {
    
    static nameList = ["do", "re", "mi", "fa", "sol", "la", "ti"];
    constructor(name, pitch) {
        this.name = name;
        this.pitch = pitch;
    }

    show() {
        console.log("Note Values:");
        console.log(Note.nameList);
        console.log(this.name);
        console.log(this.pitch);
    }

}


class Instrument {
    record = [];

    addNote(note, pitch) {
        this.record.push(new Note(note,pitch));
    }
    removeLastNode() {
        this.record.pop();
    }
    changeNote(arrLoc, note, pitch) {
        this.record[arrLoc] = new Note(note,pitch);
    }
    shuffle() {
        let current = this.record.length,
            temporary,
            i;

        while (current) {
            i = Math.floor(Math.random() * current--);

            temporary = this.record[current];
            this.record[current] = this.record[i];
            this.record[i] = temporary;
        }
    }

    autoCompose(num){
        this.record.length=0;
        for(let i = 0; i < num; i++){
            this.record.push( new Note(
                Note.nameList[Math.floor(Math.random() * 7)],
                Math.floor(Math.random() * 7)));
        };
    }

    logRecord(){
        for(let i = 0; i<this.record.length; i++){
            console.log(this.record[i].show());
        }
    }
}

class Piano extends Instrument{
    constructor(brand, name, model){
        super();
        this.brand = brand;
        this.name = name;
        this.model = model;
    }
}

class Xylophone extends Instrument{
    constructor(brand, name, model){
        super();
        this.brand = brand;
        this.name = name;
        this.model = model;
    }
}

