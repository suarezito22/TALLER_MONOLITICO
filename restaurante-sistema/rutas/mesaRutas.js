const express = require('express');
const router = express.Router();
const MesaControlador = require('../controladores/MesaControlador');

router.get('/', MesaControlador.listar);

module.exports = router;