<?php
class Producto {
    private ?PDO $conn;
    private string $table = 'productos';

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function consultarTodo(): array {
        $query = "SELECT p.id, p.nombre, p.descripcion, p.precio, p.stock, p.categoria_id, c.nombre AS categoria_nombre 
                  FROM {$this->table} p 
                  INNER JOIN categorias c ON p.categoria_id = c.id 
                  ORDER BY p.id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function obtenerPorId(int $id): ?array {
        $query = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch();
        return $resultado ?: null;
    }

    public function insertar(string $nombre, string $descripcion, float $precio, int $stock, int $categoria_id): bool {
        $query = "INSERT INTO {$this->table} (nombre, descripcion, precio, stock, categoria_id) 
                  VALUES (:nombre, :descripcion, :precio, :stock, :categoria_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
        $stmt->bindParam(':categoria_id', $categoria_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function actualizar(int $id, string $nombre, string $descripcion, float $precio, int $stock, int $categoria_id): bool {
        $query = "UPDATE {$this->table} 
                  SET nombre = :nombre, descripcion = :descripcion, precio = :precio, stock = :stock, categoria_id = :categoria_id 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
        $stmt->bindParam(':categoria_id', $categoria_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function eliminar(int $id): bool {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}