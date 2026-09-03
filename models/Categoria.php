<?php
class Categoria {
    private ?PDO $conn;
    private string $table = 'categorias';

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function consultarTodo(): array {
        $query = "SELECT id, nombre, descripcion FROM {$this->table} ORDER BY nombre ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}