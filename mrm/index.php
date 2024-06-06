
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./includes/css/colors.css">
    <link rel="stylesheet" href="./includes/css/navbar.css">
    <link rel="stylesheet" href="./includes/css/register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>MrMoreira Academy</title>
</head>
<body>
    <?php include './includes/navbar.php' ?>

    <?php 
           echo '<form action="" method="post">';
           echo '<button type="submit" name="deslogar">Deslogar script</button>';
           echo '</form>';
           echo session_id();
           echo $_SESSION['nome'];
           echo $_SESSION['email'];

           // Verifica se o botão foi clicado e chama a função
           if (isset($_POST['deslogar'])) {
                unset($_SESSION['email'],$_SESSION['senha'] );
                session_destroy();
                echo "Deslogado com sucesso!";
                
                
            };       
    
    ?>
</body>
</html>