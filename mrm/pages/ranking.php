<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../includes/css/colors.css">
    <link rel="stylesheet" href="../includes/css/navbar.css">
    <title>Ranking</title>
    <style>
        body {
            background-color: #f9f9f9;
        }

       .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

       .table-responsive {
            overflow-x: auto;
        }

       .table-responsive table {
            width: 100%;
            border-collapse: collapse;
        }

       .table-responsive th,.table-responsive td {
            padding: 10px;
            border: 1px solid #ddd;
        }

       .btn-editar {
            display: flex;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            justify-content: center;
        }

       .btn-excluir {
            display: flex;
            background-color: #FF0000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            justify-content: center;
        }
    </style>
</head>
<body>
    <?php include('../includes/navbar.php');?>
    <div class="container">
        <h1 style="text-align: center; margin-top: 20px;">Ranking</h1>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Atividade codigo</th>
                        <th>Atividade</th>
                        <th>RA</th>
                        <th>Nota geral</th>
                        <th>Data entrega</th>
                        <th>Observações</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    include('../processer/dbconnect.php');
                    $db = new Database();
                    $conn = $db->connect();

                    if ($conn) {
                        try {
                            $query = "SELECT * FROM `entrega_atividade`";
                            $stmt = $conn->prepare($query); 
                            $stmt->execute(); 
                            $results = $stmt->fetchAll(); 
                            if ($results) {
                                foreach ($results as $linha) {
                                    echo "<tr>
                                        <td>". $linha['atividade_codigo']. "</td>
                                        <td>". $linha['atividade_nome']. "</td>
                                        <td>". $linha['atividade_aluno']. "</td>
                                        <td>". $linha['atividade_nota']. "</td>
                                        <td>". $linha['atividade_data_entrega']. "</td>
                                        <td>". $linha['atividade_observacoes']. "</td>
                                        <td>
                                            <a href='../pages/edit_att.php?atividade_codigo=". $linha['atividade_codigo']. "' class='btn-editar'>Editar</a>
                                            <a href='../processer/excluir.php?atividade_codigo=". $linha['atividade_codigo']. "' class='btn-excluir'>Excluir</a>
                                        </td>
                                    </tr>";
                                }

                            } else {
                                echo "Nenhuma entrega de atividade cadastrada";
                            }

                        } catch (PDOException $e) {
                            echo "Erro na consulta: ". $e->getMessage();
                        }
                    } else {
                        echo "Falha na conexão.";
                    }
               ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Adicionei um script para tornar a tabela responsiva
        function responsiveTable() {
            var table = document.querySelector('table');
            var tableWidth = table.offsetWidth;
            var screenWidth = window.innerWidth;

            if (screenWidth < 768) {
                table.style.width = '100%';
                table.style.overflowX = 'auto';
            } else {
                table.style.width = tableWidth + 'px';
                table.style.overflowX = 'hidden';
            }
        }

        window.addEventListener('resize', responsiveTable);
        responsiveTable();
    </script>
</body>
</html>