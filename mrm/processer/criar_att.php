<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../includes/css/colors.css">
    <link rel="stylesheet" href="../includes/css/navbar.css">
    <link rel="stylesheet" href="../includes/css/register.css">
</head>
<body>
    <?php include '../includes/navbar.php'; ?>
</body>
</html>

<?php
echo "Pagina OKAY";

/*if (isset($_POST["btn-send"])) {
    $nomeatt = $_POST["nomeatt"];
    $ra = $_SESSION["ra"];
    $descricao = $_POST["descricao"];
    $nota = $_POST["nota"];

    echo "Nome da Atividade: $nomeatt <br> RA: $ra <br> Descrição: $descricao <br> Nota: $nota";
}*/
if (isset($_POST["btn-send"])) {
    $nomeatt = $_POST["nomeatt"];
    $ra = $_SESSION['ra'];
    $descricao = $_POST["descricao"];
    $nota = $_POST["nota"];

    // Gravar no banco de dados
    include_once 'dbconnect.php';
    $db = new Database();
    $conn = $db->connect();

    if ($conn) {
        try {
            $query = "INSERT INTO entrega_atividade (atividade_nome, atividade_aluno, atividade_nota, atividade_observacoes) 
            VALUES (:nomeatt, :ra, :nota, :descricao)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':nomeatt', $nomeatt);
            $stmt->bindParam(':ra', $ra);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':nota', $nota);

            if ($stmt->execute()) {
                echo "Cadastro realizado com sucesso!";
                header('Location: /mrm/pages/ranking.php');
                exit;
            } else {
                echo "Erro ao cadastrar!";
            }
        } catch (PDOException $e) {
            echo "Erro ao executar query: ". $e->getMessage();
        }
    } else {
        echo "Erro de conexão!";
    }
}

?>