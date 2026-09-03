# Sistema de Gestión de Productos - CRUD MVC

Módulo dinámico para la gestión de productos y categorías desarrollado bajo el patrón de arquitectura **Modelo-Vista-Controlador (MVC)**, utilizando **PHP (PDO)**, **MySQL**, **HTML5**, **CSS3** y **JavaScript**.

---

## 🛠️ Tecnologías y Arquitectura

* **Patrón de Diseño:** MVC (Separación estricta de responsabilidades).
* **Backend:** PHP 8+ utilizando la extensión orientada a objetos **PDO** y sentencias preparadas para prevenir inyecciones SQL.
* **Base de Datos:** MySQL / MariaDB (tablas normalizadas y llaves foráneas).
* **Frontend:** HTML5 semántico y CSS3 responsivo.
* **Cliente:** JavaScript nativo para validación preventiva de formularios antes del envío HTTP.

---

## 📁 Estructura del Proyecto

```text
gestion_proyectos/
├── config/
│   └── Database.php             # Conexión persistente PDO a MySQL
├── controllers/
│   └── ProductoController.php   # Manejo de flujo y acciones CRUD
├── models/
│   ├── Categoria.php            # Consultas a la entidad categorías
│   └── Producto.php             # Consultas relacionales y CRUD de productos
├── public/
│   ├── css/
│   │   └── estilos.css          # Estilos responsivos
│   └── js/
│       └── main.js              # Validación nativa en el cliente
├── views/
│   ├── formulario.php           # Vista unificada para crear y editar
│   └── listar.php               # Vista principal con tabla relacional
├── index.php                    # Front Controller (enrutador central)
└── schema.sql                   # Estructura y datos iniciales de la base de datos
