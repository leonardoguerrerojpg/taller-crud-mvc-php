<?php
require_once __DIR__ . '/../models/Producto.php';
require_once __DIR__ . '/../models/Categoria.php';

class ProductoController {
    private Producto $productoModel;
    private Categoria $categoriaModel;

    public function __construct(PDO $db) {
        $this->productoModel = new Producto($db);
        $this->categoriaModel = new Categoria($db);
    }

    // Listar todos los registros
    public function index(): void {
        $productos = $this->productoModel->consultarTodo();
        require_once __DIR__ . '/../views/listar.php';
    }

    // Cargar formulario para crear un registro
    public function crear(): void {
        $categorias = $this->categoriaModel->consultarTodo();
        require_once __DIR__ . '/../views/formulario.php';
    }

    // Procesar el guardado de un nuevo registro
    public function guardar(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');
            $descripcion = trim($_POST['descripcion'] ?? '');
            $precio = (float)($_POST['precio'] ?? 0);
            $stock = (int)($_POST['stock'] ?? 0);
            $categoria_id = (int)($_POST['categoria_id'] ?? 0);

            if (!empty($nombre) && $precio > 0 && $stock >= 0 && $categoria_id > 0) {
                $this->productoModel->insertar($nombre, $descripcion, $precio, $stock, $categoria_id);
            }
            header('Location: index.php?action=index');
            exit;
        }
    }

    // Cargar formulario para editar un registro existente
    public function editar(): void {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $producto = $this->productoModel->obtenerPorId($id);

        if (!$producto) {
            header('Location: index.php?action=index');
            exit;
        }

        $categorias = $this->categoriaModel->consultarTodo();
        require_once __DIR__ . '/../views/formulario.php';
    }

    // Procesar la actualización de un registro
    public function actualizar(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int)($_POST['id'] ?? 0);
            $nombre = trim($_POST['nombre'] ?? '');
            $descripcion = trim($_POST['descripcion'] ?? '');
            $precio = (float)($_POST['precio'] ?? 0);
            $stock = (int)($_POST['stock'] ?? 0);
            $categoria_id = (int)($_POST['categoria_id'] ?? 0);

            if ($id > 0 && !empty($nombre) && $precio > 0 && $stock >= 0 && $categoria_id > 0) {
                $this->productoModel->actualizar($id, $nombre, $descripcion, $precio, $stock, $categoria_id);
            }
            header('Location: index.php?action=index');
            exit;
        }
    }

    // Eliminar un registro
    public function eliminar(): void {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id > 0) {
            $this->productoModel->eliminar($id);
        }
        header('Location: index.php?action=index');
        exit;
    }
}