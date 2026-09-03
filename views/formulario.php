<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($producto) ? 'Editar Producto' : 'Nuevo Producto' ?> - CRUD MVC</title>
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
        <section class="tarjeta-formulario">
            <h2><?= isset($producto) ? 'Editar Producto' : 'Registrar Nuevo Producto' ?></h2>

            <div id="alerta-error" class="alerta alerta-error" style="display: none;"></div>

            <form id="form-producto" action="index.php?action=<?= isset($producto) ? 'actualizar' : 'guardar' ?>" method="POST">
                <?php if (isset($producto)): ?>
                    <input type="hidden" name="id" value="<?= htmlspecialchars((string)$producto['id']) ?>">
                <?php endif; ?>

                <div class="campo">
                    <label for="nombre">Nombre del Producto *</label>
                    <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($producto['nombre'] ?? '') ?>" placeholder="Ej. Memoria RAM 16GB">
                </div>

                <div class="campo">
                    <label for="categoria_id">Categoría *</label>
                    <select id="categoria_id" name="categoria_id">
                        <option value="">-- Seleccione una categoría --</option>
                        <?php foreach ($categorias as $cat): ?>
                            <option value="<?= $cat['id'] ?>" <?= (isset($producto) && (int)$producto['categoria_id'] === (int)$cat['id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($cat['nombre']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="fila-doble">
                    <div class="campo">
                        <label for="precio">Precio (USD) *</label>
                        <input type="number" step="0.01" min="0.01" id="precio" name="precio" value="<?= htmlspecialchars((string)($producto['precio'] ?? '')) ?>" placeholder="Ej. 75.50">
                    </div>

                    <div class="campo">
                        <label for="stock">Stock *</label>
                        <input type="number" min="0" id="stock" name="stock" value="<?= htmlspecialchars((string)($producto['stock'] ?? '0')) ?>" placeholder="Ej. 20">
                    </div>
                </div>

                <div class="campo">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion" rows="4" placeholder="Breve descripción del producto..."><?= htmlspecialchars($producto['descripcion'] ?? '') ?></textarea>
                </div>

                <div class="acciones-formulario">
                    <button type="submit" class="btn btn-primario"><?= isset($producto) ? 'Actualizar Registro' : 'Guardar Producto' ?></button>
                    <a href="index.php?action=index" class="btn btn-secundario">Cancelar</a>
                </div>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> Módulo CRUD MVC - Programación Web</p>
    </footer>

    <script src="public/js/main.js"></script>
</body>
</html>