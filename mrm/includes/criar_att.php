    <div class="center">
        <div class="wrapper">
            <form action="/mrm/processer/criar_att.php" method="post" >
                <h1>Criar ATT😎</h1>
                <div class="input-box">
                    <input type="text" name="nomeatt" placeholder="Nome Da Atividade" required>
                    <i class='bx bxs-leaf'></i>
                </div>
                <div class="input-box">
                    <input type="text" name="descricao" placeholder="Descrição" required>
                    <i class='bx bx-collapse-alt'></i>
                </div>
                <div class="input-box" hidden  >
                    <input type="number" name="RA" placeholder="<?php echo $_SESSION['ra'] ?>" readonly style=" background-color:  rgba(128, 128, 128, 0.171);">
                    <i class='bx bx-copy-alt'></i>
                </div>
                <div class="input-box">
                    <input type="number" id="" name="nota" placeholder="Nota 0 A 10" min="0" max="10" require>
                    <i class='bx bxs-calendar-plus' ></i>
                </div>
                <div class="input-box">
                    <input type="Nome" name="Nome" placeholder="Nome Aluno" value="<?php
                    if ($_SESSION['adm'] == 'S' ){
                        echo "Prof. ". $_SESSION['nome']. " ". $_SESSION['sobrenome'];
                    }
                    else
                    {
                        echo "Std. ". $_SESSION['nome']. " ". $_SESSION['sobrenome'];
                    }
                    ?>
                    
                    " readonly style="background-color:  rgba(128, 128, 128, 0.171);">
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <!--<div class="remember-forgot">
                    <label ><input type="checkbox" name="" id=""> Lembre de mim</label>
                    <a href="#">Esqueceu a senha?</a>
                </div>-->
                <button type="submit" name="btn-send" class="btn-send">Enviar</button>
            </form>
        </div>
    </div>