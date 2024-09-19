<?php
require_once '../model/db.php';


class TrabalhosController
{
    private $trabalhos;

    public function __construct($search = null)
    {
        $this->trabalhos = TrabalhoHelper::obterTrabalhos($search);
        
    }

    public function exibirTrabalhos()
    {
        foreach ($this->trabalhos as $trabalho) {
            echo '<div class="trabalho">';
            echo '<h3>' . $trabalho['titulo'] . '</h3>';
            echo '<p>' . $trabalho['descricao'] . '</p>';
            echo '<p>Preço: R$' . $trabalho['preco'] . '</p>';
            echo '<a href="../view/detalhes_html.php?id=' . $trabalho['id'] . '" class="btn-info">Mais informações</a>';
            echo '</div>';
        }
    }
}

session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../view/login_html.php");
    exit();
}

$search = isset($_GET['search']) ? $_GET['search'] : null;
$trabalhosController = new TrabalhosController($search);
$trabalhosController->exibirTrabalhos("location: ../view/home_html.php");
?>
