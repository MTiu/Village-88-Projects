class User {
    index(req, res) {
        res.render("index", { data: req.session.error });
    }

    process(req, res) {
        let data = req.body;
        console.log("POST DATA", data);

        if (data.name) {
            req.session.error = "";
            req.session.data = data;
            res.redirect("/result");
        } else {
            req.session.error = "Name isn't optional! IT'S ALL A LIE!";
            res.redirect("/");
        }
    }

    results(req, res) {
        res.render("result", {data: req.session.data});
    }
}

module.exports = new User();
