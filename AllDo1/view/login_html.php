<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="../view/css/style.css">
</head>
<body>
<form method="POST" action="../controller/login.php">
        <div class="box">
        <img src="../view/img/LogoCinza.jpg" alt="Logo Alldo">
    <h2 class = "borda-bottom-degrade">Login</h2> 
        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" required>
            </div>
            <div class="buttons">
            <input type="submit" name="entrar_contratante" value="Entrar como Contratante" class="btn-contratante-anunciante">
            <input type="submit" name="entrar_anunciante" value="Entrar como Anunciante" class="btn-contratante-anunciante">
            </div>
        <div class="cadastro-link">
            <p>Não tem cadastro? <a href="cadastro_html.php">Cadastre-se aqui</a></p>
        </div>
    </div>
    </form>
</body>
</html>