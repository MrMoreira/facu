<?php
// config/Database.php

class Database
{
    // Configurações do Banco de Dados
    private $host = "localhost";
    private $db_name = "mnoficina";
    private $username = "root";
    private $password = "";
    private $conn;

    // Método para obter a conexão com o banco de dados
    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }

        return $this->conn;
    }
}

$connection = new Database();
$conn = $connection->getConnection();

?>
