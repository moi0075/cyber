const express = require('express');
const router = express.Router()


router.get("/tstMe", (req, res) => { 
    var r = /([a-z]+)+$/;

    let match = r.test(req.query.id || ""); // Vérifie l'entrée de manière sécurisée
    res.json({ isValid: match }); // Réponse structuré
    
});


module.exports = router
