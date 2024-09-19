<?php
session_start();

require_once '../model/db.php';


if (!isset($_SESSION['email'])) {
    header('Location: ../controller/login_html.php');
    exit();
}

$historico = Usuario::obterHistorico($_SESSION['email']);

?>
