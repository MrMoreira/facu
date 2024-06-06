<?php
class Database {
    private $host = '144.22.176.81';
    private $db_name = 'mrm';
    private $username = 'MrMoreira';
    private $password = 'Caique100.';
    //private $username = 'mrmoreira';
    //private $password = 'Morrice123';
    private $conn;

    public function connect() {
        $this->conn = null;

        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name;
            $this->conn = new PDO($dsn, $this->username, $this->password);
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        }
        return $this->conn;
    }
}


?>