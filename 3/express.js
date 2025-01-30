const express = require('express');
const escape = require('escape-html'); // Librairie pour échapper les entrées utilisateur

const router = express.Router();

router.get('/greeting', (req, res) => {
    const name = req.query.name || "Guest"; // Valeur par défaut pour éviter undefined
    res.send(`<h1> Hello : ${escape(name)}</h1>`); // Empêche l'injection XSS
});

router.get('/greet-template', (req, res) => {
    const name = req.query.name || "Guest";
    res.render('index', { user_name: name }); // Assurez-vous que le moteur de template échappe bien les valeurs
});

module.exports = router;
