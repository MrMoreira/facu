<?php
require_once 'dbconnect.php'; // inclui o arquivo de conexão com o banco de dados

$database = new Database();
$conn = $database->connect();

if ($conn) {
    $atividade_codigo = $_GET['atividade_codigo'];

    try {
        $query = "DELETE FROM `entrega_atividade` WHERE `atividade_codigo` = :atividade_codigo";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':atividade_codigo', $atividade_codigo);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Registro excluído com sucesso!";
            header('Location: /mrm/pages/ranking.php');
            exit;
        } else {
            echo "Erro ao excluir registro.";
        }
    } catch (PDOException $e) {
        echo "Erro: ". $e->getMessage();
    }
} else {
    echo "Erro de conexão com o banco de dados.";
}