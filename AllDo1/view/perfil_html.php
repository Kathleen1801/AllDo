<!DOCTYPE html>
<html>
<head>
    <title>Perfil</title>
    <link rel="stylesheet" type="text/css" href="../view/css/perfil.css">
</head>
<body>
    <div class="box">
        <div class="box-buttons">
            <button onclick="window.history.back()" class="header-button">Voltar</button>
            <a href="login_html.php" class="header-button">Sair</a>
        </div>
        <img src="view/img/logobranca.jpg" alt="">
        <h2 class = " borda-bottom-degrade">Perfil</h2> 

    <form method="POST" action="../controller/perfil.php">
        <?php  require_once '..\controller\perfil.php';?>    
        <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo $usuario['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" value="<?php echo $usuario['senha']; ?>" required>
            </div>
            <div class="form-group">
                <label for="profissao">Profissão:</label>
                <input type="text" name="profissao" id="profissao" value="<?php echo $usuario['profissao']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" value="<?php echo $usuario['nome']; ?>" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" id="telefone" value="<?php echo $usuario['telefone']; ?>" required>
            </div>

            <div class="form-group">
                <input type="hidden" name="id" id="id" value="<?php echo $usuario['id']; ?>" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Atualizar" class="btn-atualizar">
                </form>
                <script>
        function exibirPopUp() {
            alert("Usuário atualizado com sucesso!");
        }
        </script>
                <form method="POST" action="../controller/excluir.php">
                <input type="hidden" name="id" id="id" value="<?php echo $usuario['id']; ?>" required>
        <?php  require_once '..\controller\excluir.php';?>    
            <div class="form-group">
                <input type="submit" value="Excluir" class="btn-excluir">
            </div>
    </form>
            </div>
    
    </div>

</body>
</html>