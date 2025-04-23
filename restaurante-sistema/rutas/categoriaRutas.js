const express = require('express');
const router = express.Router();
const CategoriaControlador = require('../controladores/CategoriaControlador');

router.get('/', CategoriaControlador.listar);

module.exports = router;