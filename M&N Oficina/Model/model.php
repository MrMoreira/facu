<?php

require_once 'config/Database.php';

class Model{
    private $pdo;

    public function __construct()
    {
        $dsn = 'mysql:host=locahost;dbname=morrice';
        $user = 'root';
        $password = '';
        $this->pdo = new PDO($dsn, $user, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function save($table, $data)
    {
        // Cria a string de colunas e a string de valores
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));

        // Prepara a query SQL
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $this->pdo->prepare($sql);

        // Executa a query com os dados fornecidos
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }
}
?>