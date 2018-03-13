
const express = require('express');
const app = express();
const mysql = require('mysql');
const bodyParser = require('body-parser');
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({
    extended: true
}));
 
 
// default route

 
// port must be set to 8080 because incoming http requests are routed from port 80 to port 8080
app.listen(8080, function () {
    console.log('Node app is running on port 8080');
});

const mc = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'testaf'
});
 
// connect to database
mc.connect()

app.get('/quizzes', function (req, res) {
    mc.query('SELECT * FROM quizzes', function (error, results, fields) {
        if (error) throw error;
        return res.send({ error: false, data: results, message: 'Quizzes list.' });
    });
});
app.post('/quizzes', function (req, res) {
 	json=JSON.parse(req.body);
    let user_id = json.user_id;
    let question1 = json.question1;
    let question2 = json.question2;
    let question3 = json.question3;
    console.log(json);
 	if (!user_id) {
        return res.status(400).send({ error:true, message: 'Please provide quiz' });
    }
 
    mc.query("INSERT INTO quizzes SET ? ", { user_id: user_id, question1: question1,question2:question2,question3:question3}, function (error, results, fields) {
        if (error) throw error;
        return res.send({ error: false, data: results, message: 'New quiz has been created successfully.' });
    });
});
module.exports = app;