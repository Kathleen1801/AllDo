<?php
require_once '../model/db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];

    Usuario::excluirUsuario($id);
    header('Location: ..\view\login_html.php');
    exit();
}

if (!isset($_SESSION['email'])) {
    header('Location: ..\view\login_html.php');
    exit();
}

$email = $_SESSION['email'];
$usuario = Usuario::obterUsuarioPorEmail($email);
?>
