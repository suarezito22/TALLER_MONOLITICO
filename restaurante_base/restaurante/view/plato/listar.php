<!-- listar_platos.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Platos</title>
    <link rel="stylesheet" href="css/listar.css">
    <script src="js/listar.js" defer></script>
</head>
<body>
    <div class="menu-container">
        <h2>Lista de Platos</h2>

        <!-- Enlace para agregar un nuevo plato -->
        <a href="router.php?controller=plato&action=crear">Agregar Nuevo Plato</a>
        <br><br>

        <!-- Tabla de Platos -->
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Acción</th>
            </tr>
            <?php 
            // Suponiendo que la variable $platos contiene los platos de la base de datos
            while ($p = $platos->fetch_assoc()): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= $p['descripcion'] ?></td>
                <td><?= $p['categoria'] ?></td>
                <td><?= $p['cantidad'] ?></td>
                <td><?= $p['precio'] ?></td> <!-- Cambié 'precio_unitario' por 'precio' -->
                <td><a href="router.php?controller=plato&action=eliminar&id=<?= $p['id'] ?>">Eliminar</a></td>
            </tr>
            <?php endwhile; ?>
        </table>

        <br><br>

        <!-- Botón para volver al menú (fuera del enlace para evitar el doble borde) -->
        <button type="button" onclick="window.location.href='index.php'">Volver al Menú</button>
    </div>
</body>
</html>


