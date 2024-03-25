const sessionConfig = {
    secret: "SikretKode",
    resave: false,
    saveUninitialized: true,
    cookie: { maxAge: 60000 },
};

module.exports = sessionConfig;