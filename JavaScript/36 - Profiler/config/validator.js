const bcrypt = require('bcryptjs');

class Validator{
    constructor(){
        this.rules = {};
        this.errors = {};
        this.encrypt = bcrypt;
    }

    setRules(fieldName, rules) {
        this.rules[fieldName] = rules;
    }

    runValidation(data){
        for (const fieldName in this.rules) {
            const fieldRules = this.rules[fieldName];
            const value = data[fieldName];

            for(let i = 0; i<fieldRules.length; i++){
                const [rule, condition] = fieldRules[i].split(':');
                switch (rule) {
                    case 'required':
                        if (!value || value.trim() === '') {
                            this.errors[fieldName] = `${fieldName} shouldn't be blank!`;
                        }
                        break;

                    case 'min_length':
                        if (value && value.length < parseInt(condition)) {
                            this.errors[fieldName] = `${fieldName} must be at least ${condition} characters long`;
                        }
                        break;

                    case 'max_length':
                        if (value && value.length > parseInt(condition)) {
                            this.errors[fieldName] = `${fieldName} cannot be longer than ${condition} characters`;
                        }
                        break;
                    
                    case 'no_numbers':
                        for(let i = 0; i< value.length; i++) {
                            if(!isNaN(parseInt(value[i]))){
                                this.errors[fieldName] = `${fieldName} should not contain numbers!!`;
                            }
                        }
                        break;

                    case 'is_email':
                        if(!(value.includes('@') && value.includes('.'))){
                            this.errors[fieldName] = `${fieldName} is not a valid email address`;
                        }
                        break;

                    case 'same_as':
                        if(value !== data[condition]){
                            this.errors[fieldName] = `${fieldName}s do not match `;
                        }
                        break;
                }
            }
        }
        if(Object.keys(this.errors).length === 0){
            return false;
        } else {
            const error = this.errors;
            this.errors = {};
            return error;
        }
    }
}

module.exports = new Validator();



// const validations = new Validator();

// const data = {password : 'Pass',
//                 confPassword: 'Pass'};

// validations.setRules('password',['same_as:confPassword']);

// validations.runValidation(data);

// console.log(validations.errors);

/*

    async register(data) {
        const validator = new Validation();
        const key = await this.fetchSolo(`SELECT * FROM users WHERE email = '${data.email}'`);
        if(key == undefined){
            const passwordHash = validator.encrypt.hashSync(data.password, 8);
            await this.execQuery(`INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) VALUES ('${data.fname}', '${data.lname}', '${data.email}', '${passwordHash}', now(), now())`);
        } else {
            return 'Email Address Already Existing';
        }
    }

    async login(data) {
        const validator = new Validation();
        const value = await this.fetchSolo(`SELECT * FROM users WHERE email = '${data.email}'`);
        if(validator.encrypt.compareSync(data.password, value.password)){
            return value;
        }
        return false;
    }
    
*/

