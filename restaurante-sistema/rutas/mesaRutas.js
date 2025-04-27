import express from 'express';
import { registrarMesa, listarMesas, actualizarMesa, eliminarMesa } from '../controladores/mesaControlador.js';

const router = express.Router();

// Rutas para mesas
router.post('/mesas', registrarMesa);
router.get('/mesas', listarMesas);
router.put('/mesas/:id', actualizarMesa);
router.delete('/mesas/:id', eliminarMesa);

export default router;