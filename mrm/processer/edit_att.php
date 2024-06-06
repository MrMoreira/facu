<?php
if (isset($_POST["btn-send"])) {
    $nomeatt = $_POST["atividade_nome"];
    $descricao = $_POST["atividade_observacoes"];
    $nota = $_POST["atividade_nota"];
    $atividade_codigo = $_POST["atividade_codigo"];

    // Debug: Exibir os valores das variáveis
    echo "Nome: $nomeatt<br>";
    echo "Descrição: $descricao<br>";
    echo "Nota: $nota<br>";
    echo "Código da Atividade: $atividade_codigo<br>";

    // Verificar se o código da atividade está presente
    if (empty($atividade_codigo)) {
        echo "Código da Atividade está vazio. Não é possível editar a atividade.";
        exit;
    }

    // Gravar no banco de dados
    include_once 'dbconnect.php';
    $db = new Database();
    $conn = $db->connect();

    if ($conn) {
        echo "Query executada com sucesso!</br>";
        try {
            $query = "UPDATE entrega_atividade SET atividade_nome = :nomeatt, atividade_observacoes = :descricao, atividade_nota = :nota 
            WHERE atividade_codigo = :atividade_codigo";

            // Debug: Mostrar a query antes de executá-la
            echo "Query: $query<br>";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(':nomeatt', $nomeatt);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':nota', $nota);
            $stmt->bindParam(':atividade_codigo', $atividade_codigo);

            // Debug: Exibir o estado da execução da query
            if ($stmt->execute()) {
                echo "Atividade editada com sucesso!";
                header('Location: /mrm/pages/ranking.php');
                exit;
            } else {
                // Debug: Capturar e exibir informações sobre o erro
                $errorInfo = $stmt->errorInfo();
                echo "Erro ao editar atividade!<br>";
                echo "SQLSTATE: " . $errorInfo[0] . "<br>";
                echo "Error Code: " . $errorInfo[1] . "<br>";
                echo "Message: " . $errorInfo[2] . "<br>";
            }
        } catch (PDOException $e) {
            echo "Erro ao executar query: ". $e->getMessage();
        }
    } else {
        echo "Erro de conexão!";
    }
}
?>
