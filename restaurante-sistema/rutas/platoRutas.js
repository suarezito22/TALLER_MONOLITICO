const express = require('express');
const router = express.Router();
const PlatoControlador = require('../controladores/PlatoControlador');

router.get('/', PlatoControlador.listar);

module.exports = router;