const MainModel = require("../system/MainModel");
const Validation = require("../config/validator");
/* Model Template */
class Model extends MainModel {
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

    loginValidation(data){
        const validator = new Validation();
        validator.setRules('email',['is_email','required','min_length:10','max_length:255']);
        validator.setRules('password',['required','min_length:3','max_length:255']);
        
        const errors = validator.runValidation(data);
        if(errors){
            return errors;
        } else {
            return 'success';
        }
    }

    registerValidation(data){
        const validator = new Validation();
        validator.setRules('email',['is_email','required','min_length:10','max_length:255']);
        validator.setRules('password',['required','min_length:3','max_length:255']);
        validator.setRules('confPassword',['required','same_as:password']);
        validator.setRules('fname',['min_length:3','max_length:255','required']);
        validator.setRules('lname',['min_length:3','max_length:255','required']);
        
        const errors = validator.runValidation(data);
        if(errors){
            return errors;
        } else {
            return 'success';
        }
    }
}

module.exports = new Model();
