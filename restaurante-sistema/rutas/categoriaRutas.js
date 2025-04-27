import express from 'express';
import { registrarCategoria, listarCategorias, actualizarCategoria, eliminarCategoria } from '../controladores/CategoriaControlador.js';

const router = express.Router();

// Rutas
router.post('/categorias', registrarCategoria);
router.get('/categorias', listarCategorias);
router.put('/categorias/:id', actualizarCategoria);
router.delete('/categorias/:id', eliminarCategoria);

export default router;