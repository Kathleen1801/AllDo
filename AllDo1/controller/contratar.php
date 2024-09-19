<?php
session_start();
require_once '../model/db.php';

$trabalhoid = isset($_GET['id']) ? $_GET['id'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    $metodoPagamento = isset($_POST['metodo']) ? $_POST['metodo'] : null;

    if (isset($_GET['id'])) {
        $publicante = Usuario::obterUsuarioPorEmailDoTrabalho(($_GET['id']));

        if ($publicante !== null) {
            $telefonePublicante = $publicante['telefone'];

            if ($telefonePublicante !== null) {
                if (Usuario::registrarPagamento($nome, $publicante['email'], $metodoPagamento, $telefonePublicante)) {
                    echo "Contratou o serviço com sucesso.";
                    Historico::registrar($_SESSION['email'], $publicante['email'], $trabalhoid);
                    $linkWhatsApp = "https://api.whatsapp.com/send?phone={$telefonePublicante}";
                    echo "<br>Entre em contato via <a href='{$linkWhatsApp}' target='_blank'>WhatsApp</a>";
                } else {
                    echo "Erro ao registrar as informações no banco de dados.";
                }
            } else {
                echo "Erro: Número de telefone do usuário que publicou o trabalho é nulo.";
            }
        } else {
            echo "Erro: Não foi possível obter informações do usuário que publicou o trabalho.";
        }
    } else {
        echo "Usuário não autenticado.";
    }
}
?>

