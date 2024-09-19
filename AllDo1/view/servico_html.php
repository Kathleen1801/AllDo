<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviço</title>
    <link rel="stylesheet" type="text/css" href="../view/css/servico.css">
</head>
<body>
<form method="POST" action="../controller/servico.php"> </form>
    <header>
        <div class="header-gradient"></div> <br>
        <img src="../view/img/logo3.jpg" alt="logo5"> <br>
    
        <div class="form-group">
            <a href="perfil_html.php" class="header-button">Perfil</a>
            <button onclick="window.history.back()" class="header-button">Voltar</button>
            <a href="login_html.php" class="header-button">Sair</a>
        </div>
    </header>
    <div class="container">
        <h2>Serviços em Andamento</h2>
        <div class="historico">
            <?php  require_once '..\controller\servico.php';?>
            <?php foreach ($historico as $transacao):?>
                <div class="transacao">
                    <p>Trabalho: <?php echo $transacao['titulo']; ?></p>
                    <p>Status: <?php echo $transacao['status']; ?></p>
                    <p>Data: <?php echo $transacao['data']; ?></p><hr>
                </div>
                
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>