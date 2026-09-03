<?php
// Reporte de errores para desarrollo
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Cargar la configuración de la base de datos y el controlador
require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/controllers/ProductoController.php';

// Instanciar la conexión PDO
$database = new Database();
$db = $database->connect();

// Instanciar el controlador pasándole la conexión
$controller = new ProductoController($db);

// Capturar la acción solicitada por URL (por defecto: index)
$action = $_GET['action'] ?? 'index';

// Enrutar según la acción
switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'crear':
        $controller->crear();
        break;
    case 'guardar':
        $controller->guardar();
        break;
    case 'editar':
        $controller->editar();
        break;
    case 'actualizar':
        $controller->actualizar();
        break;
    case 'eliminar':
        $controller->eliminar();
        break;
    default:
        $controller->index();
        break;
}