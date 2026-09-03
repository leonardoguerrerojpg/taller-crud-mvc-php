<?php
class Database {
    private string $host = '127.0.0.1';
    private string $db_name = 'gestion_proyectos';
    private string $username = 'root';
    private string $password = '';
    private ?PDO $conn = null;

    public function connect(): ?PDO {
        $this->conn = null;
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
        return $this->conn;
    }
}