<?php

include_once '../processer/dbconnect.php';
$db = new Database();
$conn = $db->connect();

$atividade_codigo = $_GET['atividade_codigo'];

// Busca as informações da atividade no banco de dados
$query = "SELECT * FROM entrega_atividade WHERE atividade_codigo = :atividade_codigo";
$stmt = $conn->prepare($query);
$stmt->bindParam(':atividade_codigo', $atividade_codigo);
$stmt->execute();
$atividade = $stmt->fetch();

// Preenche o formulário com as informações da atividade
?>

<div class="center">
    <div class="wrapper">
        <form action="../processer/edit_att.php" method="post">
            <h1>Editar ATT😎</h1>
            <div class="input-box">
                <input type="text" name="atividade_nome" placeholder="Nome Da Atividade" required value="<?php echo htmlspecialchars($atividade['atividade_nome']); ?>">
                <i class='bx bxs-leaf'></i>
            </div>
            <div class="input-box">
                <input type="text" name="atividade_observacoes" placeholder="Observações" required value="<?php echo htmlspecialchars($atividade['atividade_observacoes']); ?>">
                <i class='bx bx-collapse-alt'></i>
            </div>
            <div class="input-box">
                <input type="number" name="atividade_nota" placeholder="Nota 0 A 10" min="0" max="10" required value="<?php echo htmlspecialchars($atividade['atividade_nota']); ?>">
                <i class='bx bxs-calendar-plus'></i>
            </div>
            <!-- Campo hidden para enviar o código da atividade -->
            <input type="hidden" name="atividade_codigo" value="<?php echo htmlspecialchars($atividade['atividade_codigo']); ?>">
            <button type="submit" name="btn-send" class="btn-send">Enviar</button>
        </form>
    </div>
</div>
