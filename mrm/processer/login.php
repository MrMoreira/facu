<!-- Login Processer -->
<?php

 if(isset($_POST["btn-send"]))
 {
        $email = $_POST["email"];
        $senha = $_POST["senha"];
    
        include_once 'dbconnect.php';
        $db = new Database();
        $conn = $db->connect();
    
        if($conn)
        {
            $query = "SELECT * FROM usuario WHERE email = :email AND senha = :senha ";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
    
            if($stmt->execute())
            {
                if($stmt->rowCount() > 0)
                {
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    session_start();
                    $_SESSION['logado'] = true;
                    $_SESSION['nome'] = $user['nome'];
                    $_SESSION['sobrenome'] = $user['sobrenome'];
                    $_SESSION['ra'] = $user['ra'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['adm'] = $user['adm'];
                    header('Location: /mrm/');
                    exit;

                    //echo "Login realizado com sucesso!";
                }
                else
                {
                    echo "Email ou senha incorretos!";
                }
            }
            else
            {
                echo "Erro ao realizar login!";
            }
        }
        else
        {
            echo "Erro de conexão!";
        }
 }
?>