<?php
require_once '../model/db.php';


class Autenticacao
{
    public static function autenticarUsuario($email, $senha)
    {
        if (self::verificarCredenciais($email, $senha)) {
            session_start();
            $_SESSION['email'] = $email;

            $tipo = self::obterTipoUsuario($email);

            if ($tipo == "contratante") {
                header("Location: ../view/home_html.php");
                exit();
            } elseif ($tipo == "anunciante") {
                header("Location: ../view/adicionar_html.php");
                exit();
            } else {
                echo "Tipo de usuário inválido.";
            }
        } else {
            echo "Credenciais incorretas. Falha no login.";
        }
    }

    private static function verificarCredenciais($email, $senha)
    {
        return Usuario::verificarCredenciais($email, $senha);
    }

    private static function obterTipoUsuario($email)
    {
        return Usuario::obterTipoUsuario($email);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    Autenticacao::autenticarUsuario($email, $senha);
}
?>
