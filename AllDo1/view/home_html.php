<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../view/css/home.css">
</head>
<body>
    <form method="POST" action="../controller/home.php">    </form>
        <header>
        <div class="header-gradient"></div>
        <img src="../view/img/logo4.jpg" alt="logo5"> <br>
        <div class="header-buttons">
            <a href="perfil_html.php" class="header-button">Perfil</a>
            <a href="servico_html.php" class="header-button">Serviços</a>
            <button onclick="window.history.back()" class="header-button">Voltar</button>
            <a href="login_html.php" class="header-button">Sair</a>
        </div>
     </header>

        <div class="container">
            <h2>Trabalhos disponíveis</h2>
            <div class="search-bar">
                <form method="GET" action="../view/home_html.php">
                    <input type="text" name="search" placeholder="Pesquisar perfil...">
                    <input type="submit" value="Pesquisar">
                </form>
            </div> <br>
            <div class="trabalhos">
                <?php
                require_once '../controller/home.php';
                ?>
            </div>
        </div>
</body>
</html>