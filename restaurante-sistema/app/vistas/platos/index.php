<?php
require_once __DIR__ . '/../../controladores/PlatoControlador.php';
$platos = PlatoControlador::listar();
?>

<h1>Platos</h1>
<a href="crear.php">Crear Nuevo Plato</a>

<table border="1">
    <thead>
        <tr>
            <th>Descripción</th>
            <th>Categoría</th>
            <th>Precio Unitario</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($platos as $plato): ?>
            <tr>
                <td><?= $plato['descripcion'] ?></td>
                <td><?= $plato['categoria_nombre'] ?></td>
                <td>$<?= number_format($plato['precio_unitario'], 2) ?></td>
                <td>
                    <a href="editar.php?id=<?= $plato['id'] ?>">Editar</a>
                    <a href="eliminar.php?id=<?= $plato['id'] ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>