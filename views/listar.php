<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos - CRUD MVC</title>
    <link rel="stylesheet" href="public/css/estilos.css">
</head>
<body>
    <header>
        <h1>Sistema de Gestión de Productos</h1>
        <nav>
            <a href="index.php?action=index">Inicio</a>
            <a href="index.php?action=crear">Nuevo Producto</a>
        </nav>
    </header>

    <main class="contenedor">
        <section class="encabezado-seccion">
            <h2>Listado de Productos Registrados</h2>
            <a href="index.php?action=crear" class="btn btn-primario">+ Registrar Producto</a>
        </section>

        <section class="tabla-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($productos)): ?>
                        <?php foreach ($productos as $item): ?>
                            <tr>
                                <td><?= htmlspecialchars((string)$item['id']) ?></td>
                                <td><strong><?= htmlspecialchars($item['nombre']) ?></strong></td>
                                <td><?= htmlspecialchars($item['descripcion'] ?? 'Sin descripción') ?></td>
                                <td><span class="badge"><?= htmlspecialchars($item['categoria_nombre']) ?></span></td>
                                <td>$<?= number_format((float)$item['precio'], 2) ?></td>
                                <td><?= htmlspecialchars((string)$item['stock']) ?></td>
                                <td class="acciones">
                                    <a href="index.php?action=editar&id=<?= $item['id'] ?>" class="btn btn-editar">Editar</a>
                                    <a href="index.php?action=eliminar&id=<?= $item['id'] ?>" class="btn btn-eliminar" onclick="return confirm('¿Seguro que deseas eliminar este producto?');">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="sin-registros">No hay productos registrados en el sistema.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> Módulo CRUD MVC - Programación Web</p>
    </footer>
</body>
</html>