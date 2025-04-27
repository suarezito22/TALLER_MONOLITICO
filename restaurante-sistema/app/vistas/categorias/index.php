<?php
require_once __DIR__ . '/../../controladores/CategoriaControlador.php';
$categorias = CategoriaControlador::listar();
?>

<h1>Categorías</h1>
<a href="crear.php">Crear Nueva Categoría</a>

<table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td><?= $categoria['nombre'] ?></td>
                <td>
                    <a href="editar.php?id=<?= $categoria['id'] ?>">Editar</a>
                    <a href="eliminar.php?id=<?= $categoria['id'] ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>