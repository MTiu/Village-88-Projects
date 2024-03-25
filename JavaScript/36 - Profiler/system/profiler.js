const fs = require("fs");

function profiler(req, res, next) {
    const startTime = process.hrtime();

    console.log("Session:", req.session);

    console.log("Body:", req.body);

    console.log("Get:", req.query);

    res.on('finish', () => {
        try {
            const queryLog = fs.readFileSync(
                `${__dirname}../../logs/queryLog.txt`,
                "utf8"
            );
            console.log("Executed Queries:", queryLog);
        } catch (error) {
            console.log("No Queries");
        }

        const endTime = process.hrtime(startTime);
        const elapsedTime = (endTime[0] * 1e9 + endTime[1]) / 1e6;
        console.log('Calculation Time:', elapsedTime, 'ms');
    });

    next();

}

module.exports = profiler;
