<?php
require_once '../model/db.php';

if (isset($_GET['id'])) {
    $trabalhoId = $_GET['id'];
    $detalhesTrabalho = new DetalhesTrabalho($trabalhoId);

    $titulo = $detalhesTrabalho->getTitulo();
    $descricao = $detalhesTrabalho->getDescricao();
    $preco = $detalhesTrabalho->getPreco();

} else {
    header('Location:controller/home.php');
    exit();
}
?>
