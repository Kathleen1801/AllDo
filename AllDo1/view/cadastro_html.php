<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" type="text/css" href="../view/css/style.css">
</head>
<body>
        <div class="box">
        <img src="../view/img/LogoCinza.jpg" alt="Logo Alldo">
    <h2 class = "borda-bottom-degrade">Cadastro</h2> 
        <form method="POST" action="../controller/cadastro.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" id="cpf" required>
            </div>
            <div class="form-group">
                <label for="profissao">Profissão:</label>
                <input type="text" name="profissao" id="profissao" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" id="telefone" required>
            </div>
            <div class="slc-tipo">
                <label for="tipo">Tipo:</label>
                <select name="tipo" id="tipo" required>
                    <option value="contratante">Contratante</option>
                    <option value="anunciante">Anunciante</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Cadastrar" class="btn-cadastrar">
                <button onclick="window.history.back()" class="header-button">Voltar</button>

            </div>
        </form>
    </div>
</body>
</html>
