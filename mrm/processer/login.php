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
                    echo "Login realizado com sucesso!";
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