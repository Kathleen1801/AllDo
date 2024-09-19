<?php require_once '../controller/contratar.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Contratar trabalho</title>
    <link rel="stylesheet" type="text/css" href="../view/css/contratar.css">
</head>
<body>
<header>
        <div class="header-gradient"></div>
        <img src="../view/img/logo4.jpg" alt="logo5"> <br>
        <div class="header-buttons">
            <a href="perfil_html.php" class="header-button">Perfil</a>
            <button class="header-button" onclick="window.history.back()" >Voltar</button>
            <a href="login_html.php" class="header-button">Sair</a>
        </div>
    </header>
    <div class="container">
        <h2>Contratar trabalho</h2>
        <form method="POST" action="../view/contratar_html.php?id=<?= $trabalhoid; ?>">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required><br>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required><br>
            </div>
            <div class="form-group">
                <label for="metodo">Método de pagamento:</label>
                <select name="metodo" id="metodo">
                    <option value="pix">PIX</option>
                    <option value="cartao_credito">Cartão de Crédito</option>
                    <option value="cartao_debito">Cartão de Débito</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Contratar" class="btn-contratar">
            </div>
        </form>
    </div>
</body>
</html>
