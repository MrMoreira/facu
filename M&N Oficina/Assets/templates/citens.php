<div class="center">
    <div class="wrapper">
        <form action="processar_cadastro.php" method="post">
            <h1>Cadastrar Itens</h1>
            <div class="input-box">
                <input type="text" name="nome" placeholder="Nome" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" name="descricao" placeholder="Descrição" required>
                <i class='bx bx-collapse-alt'></i>
            </div>
            <div class="input-box">
                <input type="text" name="tipo" placeholder="Tipo" required>
                <i class='bx bx-collapse-alt'></i>
            </div>
            <div class="input-box">
                <input type="text" name="modelo" placeholder="Modelo" required>
                <i class='bx bxl-gmail'></i>
            </div>
            <div class="input-box">
                <input type="number" name="preco_unitario" step="0.01" placeholder="Preço Unitário" required>
                <i class='bx bx-dollar'></i>
            </div>
            <div class="input-box">
                <input type="number" name="quantidade" placeholder="Quantidade" required>
                <i class='bx bx-cube'></i>
            </div>
            <div class="input-box">
                <input type="text" name="categoria" placeholder="Categoria" required>
                <i class='bx bx-category'></i>
            </div>
            <div class="input-box">
                <select name="status" required>
                    <option value="disponível">Disponível</option>
                    <option value="indisponível">Indisponível</option>
                </select>
                <i class='bx bx-check'></i>
            </div>
            <button type="submit" class="btn-send">Enviar</button>
        </form>
    </div>
</div>
