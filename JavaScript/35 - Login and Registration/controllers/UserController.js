const UserModel = require("../models/UserModel");

/* Controller Template */
class UserController {
    async index(req, res) {
        const logErrors = req.session.logErrors || {};
        const regErrors = req.session.regErrors || {};
        const success = req.session.success || '' ;
        res.render("index", { logErrors: logErrors, regErrors: regErrors, success: success});
    }

    async logProcess(req, res) {
        const validations = UserModel.loginValidation(req.body);
        if (validations == "success") {
            const key = await UserModel.login(req.body);
            if (key) {
                req.session.profile = key;
                res.redirect("/students/profile");
            } else {
                res.redirect("/");
            }
        } else {
            req.session.logErrors = validations;
            res.redirect("/");
        }
    }

    async regProcess(req, res) {
        const validations = UserModel.registerValidation(req.body);
        if (validations == "success") {
            const register = await UserModel.register(req.body);
            if(typeof register === 'string'){
                req.session.regErrors = {email: register};
            } else {
                req.session.success = 'Successful Register';
            }
        } else {
            req.session.regErrors = validations;
        }
        res.redirect("/");
    }

    profile(req, res) {
        const data = req.session.profile || false;
        console.log(data);
        if(!data){
            res.redirect('/');
        } else {
            res.render("profile",{data:data});
        }
    }

    logOut(req,res){
        req.session.profile = undefined;
        res.redirect('/');
    }
}

module.exports = new UserController();
