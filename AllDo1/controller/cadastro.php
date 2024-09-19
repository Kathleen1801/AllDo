<?php

require_once '../model/db.php';

class RegistroController
{
    public function processarRegistro()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $cpf = $_POST["cpf"];
            $profissao = $_POST["profissao"];
            $telefone = $_POST["telefone"];
            $tipo = $_POST["tipo"];

            $usuario = new Usuario($nome, $email, $senha, $cpf, $profissao, $telefone, $tipo);
            
            if ($usuario->registrar()) {
                echo "Usuário registrado com sucesso!";
            } else {
                echo "Erro ao registrar usuário.";
            }
        }
    }
}

$registroController = new RegistroController();
$registroController->processarRegistro();
?>
