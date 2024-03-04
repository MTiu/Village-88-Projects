class Person {
    constructor(name, age) {
        this.name = name;
        this.age = age;
    }
}
// I didn't remove constructor for readability purposes and for following the UML Thank you!
class Prosecutor extends Person {
    constructor(name, age) {
        super(name, age);
    }
    prosecute(defendant, defCase) {
        defendant.case = defCase;
    }
}

class Defendant extends Person {
    case = "N/A";

    constructor(name, age) {
        super(name, age);
    }
}

class Case {
    title = "N/A";
    imprisonmentTerm = "N/A";
    ageLimit = "N/A";

    constructor(title, years, months, days, minAge, maxAge) {
        this.title = title;
        this.computeReleaseData(years, months, days);
        this.ageLimit = [minAge, maxAge];
    }

    computeReleaseData(years, months, days) {
        const currentDate = new Date();

        const releaseDate = new Date(
            currentDate.getFullYear() + years,
            currentDate.getMonth() + months,
            currentDate.getDate() + days
        );

        let releaseDay = releaseDate.getDate();
        let releaseMonth = releaseDate.toLocaleString("default", { month: "long" });
        let releaseYear = releaseDate.getFullYear();

        this.imprisonmentTerm = releaseDay + ' ' + releaseMonth + ' ' + releaseYear;
    }
}

class TrialCourt {
    static initiateTrial(defendant, prosecutor) {
        console.log("Name: " + defendant.name);
        console.log("Age: " + defendant.age + " year/s old");
        console.log("Case Title: " + defendant.case.title);
        console.log("Filed by: " + prosecutor.name);
        if (TrialCourt.getVerdict(defendant)) {
            console.log("Verdict: GUILTY!!");
            console.log("Release date: " + defendant.case.imprisonmentTerm);
        } else {
            console.log("Verdict: NOT GUILTY!!");
        }
    }
    static getVerdict(defendant) {
        if (
            defendant.age < defendant.case.ageLimit[0] ||
            defendant.age > defendant.case.ageLimit[1]
        ) {
            return false;
        } else {
            return true;
        }
    }
}

// let’s say the imprisonment term for this case is 3 years, 3 months, 3 days
// and the age of someone who can be convicted is between 18 to 75 years old.
let case1 = new Case("Malicious Mischief", 3, 3, 3, 18, 75);
let prosecutor1 = new Prosecutor("John", 30);
let defendant1 = new Defendant("Girlie", 5);

prosecutor1.prosecute(defendant1, case1);

TrialCourt.initiateTrial(defendant1, prosecutor1);
/*
    Name: Girlie
    Age: 5 years old
    Case Title: Malicious Mischief
    Filed by: John
    Verdict: NOT GUILTY
*/

// let’s say imprisonment term for this case is 3 years, 3 months, 3 days
// and the age of someone who can be convicted is between 18 to 75 years old.
let prosecutor2 = new Prosecutor("John", 30);
let defendant2 = new Defendant("Onel", 25);

prosecutor2.prosecute(defendant2, case1);
// let’s say today is December 17, 2020
TrialCourt.initiateTrial(defendant2, prosecutor2);
//    Name: Onel
//    Age: 25 years old
//    Case Title: Malicious Mischief
//    Filed by: John
//    Verdict: GUILTY
//    Release date:  21 March 2024
