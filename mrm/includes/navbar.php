<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está logado
$isLoggedIn = isset($_SESSION['logado']) && $_SESSION['logado'] === true;
?>

<nav>
       <div class="logo"><a href="/mrm/"><img src="/mrm/img/MrAcademy.png" alt="MrMoreira Academy"></a></div>
       <div class="menu" >
              <ul>   <?php if ($isLoggedIn): ?>
                     <li><a href="/mrm/pages/ranking.php">Ranking</a></li>
                     <li><a href="/mrm/pages/criar_att.php">Criar ATT</a></li>
                     <li ><a href="/mrm/pages/fnd.php">Outros</a></li>
                     <?php else: ?>
                     <li><a href="/mrm/pages/fnd.php">Home</a></li>
                     <li><a href="/mrm/pages/fnd.php">vamos logar?</a></li>
                     <li><a href="/mrm/pages/fnd.php">Others</a></li>
                     <?php endif; ?>
              </ul>
       </div>
       <div class="navlogin">
              <ul>
                     <?php if ($isLoggedIn): ?>
                            <li style="">
                                   <?php echo "Olá " .$_SESSION['nome']; ?>
                                   <a href="/mrm/pages/login.php" hidden></a>
                            </li>
                            <li><a href="/mrm/pages/fnd.php">Perfil</a></li>
                     <?php else: ?>
                     <!-- Navbar para visitantes -->
                     <li><a href="/mrm/pages/login.php">Login</a></li>
                     <li><a href="/mrm/pages/register.php">Registrar</a></li>
                     <?php endif; ?>
              </ul>
       </div>
</nav>