<h2>Lista de Platos</h2>
<a href="router.php?controller=plato&action=crear">Agregar Nuevo Plato</a>
<br><br>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Descripción</th>
        <th>Categoría</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Acción</th>
    </tr>
    <?php while ($p = $platos->fetch_assoc()): ?>
    <tr>
        <td><?= $p['id'] ?></td>
        <td><?= $p['descripcion'] ?></td>
        <td><?= $p['categoria'] ?></td>
        <td><?= $p['cantidad'] ?></td>
        <td><?= $p['precio_unitario'] ?></td>
        <td><a href="router.php?controller=plato&action=eliminar&id=<?= $p['id'] ?>">Eliminar</a></td>
    </tr>
    <?php endwhile; ?>
</table>
<br><br>
<a href="index.php">
    <button type="button">Volver al Menú</button>
</a>
