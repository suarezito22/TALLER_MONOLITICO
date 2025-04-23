const express = require('express');
const router = express.Router();
const OrdenControlador = require('../controladores/OrdenControlador');

router.get('/', OrdenControlador.listar);

module.exports = router;