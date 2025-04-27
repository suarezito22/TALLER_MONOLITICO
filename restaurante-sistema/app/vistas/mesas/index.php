<?php
require_once __DIR__ . '/../../controladores/MesaControlador.php';
$mesas = MesaControlador::listar();
?>

<h1>Mesas</h1>
<a href="crear.php">Crear Nueva Mesa</a>

<table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($mesas as $mesa): ?>
            <tr>
                <td><?= $mesa['nombre'] ?></td>
                <td>
                    <a href="editar.php?id=<?= $mesa['id'] ?>">Editar</a>
                    <a href="eliminar.php?id=<?= $mesa['id'] ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>