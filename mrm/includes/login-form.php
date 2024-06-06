<div class="center">
        <div class="wrapper">
            <form action="/mrm/processer/login.php" method="post" >
                <h1>Login</h1>
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
                <button type="submit" name="btn-send" class="btn-send">Login</button>

                <div class="login-link">
                    <p>
                        Não tem uma conta?
                        <a href="/mrm/pages/register.php">Registre-se</a>
                    </p>

                </div>

            </form>
        </div>
    </div>