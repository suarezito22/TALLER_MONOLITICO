<link rel="stylesheet" href="css/mesalistar.css">

<div class="menu-container">

<h2>Lista de Mesas</h2>
<a href="router.php?controller=mesa&action=crear">Agregar Nueva Mesa</a>
<br><br>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    <?php while ($m = $mesas->fetch_assoc()): ?>
    <tr>
        <td><?= $m['id'] ?></td>
        <td><?= $m['nombre'] ?></td>
        <td>
            <a href="router.php?controller=mesa&action=editar&id=<?= $m['id'] ?>">Editar</a> |
            <a href="router.php?controller=mesa&action=eliminar&id=<?= $m['id'] ?>" onclick="return confirm('¿Estás seguro de eliminar esta mesa?')">Eliminar</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<br><br>
<a href="/taller%20monolitico/TALLER_MONOLITICO/restaurante_base/restaurante/index.php">
    <button type="button">Volver al Menú</button>
</a>

</div>
