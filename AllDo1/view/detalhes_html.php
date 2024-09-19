
<!DOCTYPE html>
<html>
<head>
    <title>Detalhes do trabalho</title>
    <link rel="stylesheet" type="text/css" href="../view/css/detalhes.css"> 
</head>
<body>
    <form method="POST" action="controller/detalhes.php">     </form>
    <header>
        <div class="header-gradient"></div>
        <img src="../view/img/logo4.jpg" alt="logo5"> <br>
        <div class="header-buttons">
            <a href="perfil_html.php" class="header-button">Perfil</a>
            <a href="servico_html.php" class="header-button">Serviços</a>
            <button class="header-button" onclick="window.history.back()" >Voltar</button>
            <a href="login_html.php" class="header-button">Sair</a>
        </div>
    </header>
    <div class="container">
        <h2>Detalhes do trabalho</h2>
        <div class="trabalho-detalhes">
        <?php
            require_once '..\controller\detalhes.php';
            ?>
            <h3><?php echo $titulo; ?></h3>
            <p><?php echo $descricao; ?></p>
            <p>Preço: R$ <?php echo $preco; ?></p>
            <a href="../view/contratar_html.php?id=<?php echo $trabalhoId; ?>" class="btn-contratar">Contratar</a>
         </div>
     </div>
</body>
</html>