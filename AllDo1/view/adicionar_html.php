
<!DOCTYPE html>
<html>
    <head>
        <title>Adicionar Trabalho</title>
        <link rel="stylesheet" type="text/css" href="../view/css/adicionar.css"> 
    </head>    
<body>
    <header>
        <div class="header-gradient"></div>
        <img src="../view/img/logo6.jpg" alt="">
        <div class="header-buttons">
            <a href="perfil_html.php" class="header-button">Perfil</a>
            <a href="servico_html.php" class="header-button">Serviço</a>
            <button onclick="window.history.back()" class="header-button">Voltar</button>
            <a href="login_html.php" class="header-button">Sair</a>
        </div>
    </header>
    <div class="container">
        <h2>Adicionar Trabalho</h2>

        <form method="POST" action="../controller/adicionar.php"> 
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" id="telefone" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="preco">Preço:</label>
                <input type="number" name="preco" id="preco" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Adicionar Trabalho" class="btn-adicionar">
            </div>
            </form>
    </div>
</body>

</html>
