<!--Cadastro no site/ Registro no site-->
<?php 
 
 if(isset($_POST["btn-send"]))
    {
        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $ra = $_POST["RA"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        //echo com quebra de linha
        //echo "Nome: $nome <br> Sobrenome: $sobrenome <br> RA: $RA <br> Email: $email <br> Senha: $senha";
        
        //gravar no banco de dados

        include_once 'dbconnect.php';
        $db = new Database();
        $conn = $db->connect();

        if($conn)
        {
            $query = "INSERT INTO usuario (nome, sobrenome, ra, email, senha) 
            VALUES (:nome, :sobrenome, :ra, :email, :senha)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':sobrenome', $sobrenome);
            $stmt->bindParam(':ra', $ra);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);

            if($stmt->execute())
            {
                echo "Cadastro realizado com sucesso!";
                header('Location: /mrm/');
                exit;
            }
            else
            {
                echo "Erro ao cadastrar!";
            }
        }
        else
        {
            echo "Erro de conexão!";
        }
    }

?>