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

module.exports = Validator;