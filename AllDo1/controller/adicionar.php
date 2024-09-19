<?php
session_start();

require_once '../model/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : null;
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
    $preco = isset($_POST['preco']) ? $_POST['preco'] : null;

    if (isset($_SESSION['email'])) {
        $conn = Database::pdo_connect_mysql();
        $trabalhoHelper = new Trabalho($conn);
        
        $trabalhoId = $trabalhoHelper->adicionarTrabalho($titulo, $descricao, $preco, $_SESSION['email']);
        
        if ($trabalhoId) {
            // Trabalho adicionado com sucesso, faça o que for necessário (redirecionar, exibir mensagem, etc.).
            echo "<script>alert('Trabalho adicionado com sucesso!!!'); window.location.href='../view/adicionar_html.php';</script>";
        } else {
            // Ocorreu um erro ao adicionar o trabalho.
            echo "Erro ao adicionar trabalho.";
        }
    } else {
        echo "Usuário não autenticado.";
    }
}
?>