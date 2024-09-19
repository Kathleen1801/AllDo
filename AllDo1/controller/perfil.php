<?php
session_start();
require_once '../model/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $profissao = $_POST['profissao'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];

    Usuario::atualizarUsuario($email, $senha, $profissao, $nome, $telefone, $id);
    $_SESSION['update_success'] = true; // Adiciona uma variável de sessão para indicar o sucesso da atualização
    header('Location: ../view/perfil_html.php');
    exit();
}

if (!isset($_SESSION['email'])) {
    header('Location: ../view/login_html.php');
    exit();
}

$email = $_SESSION['email'];
$usuario = Usuario::obterUsuarioPorEmail($email);
?>