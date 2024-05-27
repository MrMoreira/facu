<div class="center">
        <div class="wrapper">
            <form action="/mrm/processer/cadastro.php" method="post" >
                <h1>Cadastro</h1>
                <div class="input-box">
                    <input type="text" name="nome" placeholder="Nome" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="text" name="sobrenome" placeholder="Sobrenome" required>
                    <i class='bx bx-collapse-alt'></i>
                </div>
                <div class="input-box">
                    <input type="number" name="RA" placeholder="RA" required>
                    <i class='bx bx-copy-alt'></i>
                </div>
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" required>
                    <i class='bx bxl-gmail'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="senha" placeholder="Senha" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox" name="" id=""> Lembre de mim</label>
                    <a href="#">Esqueceu a senha?</a>
                </div>
                <button type="submit" name="btn-send" class="btn-send">Cadastrar</button>

                <div class="login-link">
                    <p>
                        Já tem uma conta?
                        <a href="/mrm/pages/login.php">Entrar</a>
                    </p>

                </div>

            </form>
        </div>
    </div>