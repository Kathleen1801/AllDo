<?php


class Database
{
    private static $host = 'localhost';
    private static $dbname = 'aap4';
    private static $username = 'root';
    private static $password = '';

    public static function pdo_connect_mysql()
    {
        try {
            $pdo = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8", self::$username, self::$password);
            return $pdo;
        } catch (PDOException $e) {
            exit('Erro na conexão com o banco de dados: ' . $e->getMessage());
        }
    }
}

class Usuario
{

    private $id;
    private $nome;
    private $email;
    private $senha;
    private $cpf;
    private $profissao;
    private $telefone;
    private $tipo;
  

    

    public function __construct($nome = null, $email = null, $senha = null, $cpf = null, $profissao = null, $telefone = null, $tipo = null)
    {
    
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->cpf = $cpf;
        $this->profissao = $profissao;
        $this->telefone = $telefone;
        $this->tipo = $tipo;

        
    }

    public function registrar()
    {
        $conn = Database::pdo_connect_mysql();

        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, cpf, profissao, telefone, tipo) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $result = $stmt->execute([$this->nome, $this->email, $this->senha, $this->cpf, $this->profissao, $this->telefone, $this->tipo]);

        return $result;
    }

    public static function registrarPagamento($nome, $email, $metodoPagamento, $telefone)
    {
        $conn = Database::pdo_connect_mysql();

        $stmt = $conn->prepare("INSERT INTO contratar (nome, email, metodo_pagamento, telefone) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nome, $email, $metodoPagamento, $telefone]);

        return $stmt->rowCount() > 0;
    }
    public static function verificarCredenciais($email, $senha)
    {
        $conn = Database::pdo_connect_mysql();

        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
        $stmt->execute([$email, $senha]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result !== false;
    }

    public static function obterTipoUsuario($email)
    {
        $conn = Database::pdo_connect_mysql();

        $stmt = $conn->prepare("SELECT tipo FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $result['tipo'] : false;
    }
    public static function obterUsuarioPorEmailDoTrabalho($id)
    {    
        $conn = Database::pdo_connect_mysql();

        try {
            $stmt = $conn->prepare("SELECT * FROM trabalhos WHERE id = id LIMIT 1");
            $stmt->execute();

            $trabalho = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($trabalho) {
                $stmtUsuario = $conn->prepare("SELECT * FROM usuarios WHERE email = :email LIMIT 1");
                $stmtUsuario->bindParam(':email', $trabalho['email_usuario']);
                $stmtUsuario->execute();

                $usuario = $stmtUsuario->fetch(PDO::FETCH_ASSOC);

                if ($usuario) {
                    return $usuario;
                } else {
                    echo "Erro: Não foi possível obter informações do usuário que publicou o trabalho.";
                }
            } else {
                echo "Erro: Não foi possível encontrar o trabalho associado ao e-mail do usuário.";
            }
        } catch (PDOException $e) {
            echo "Erro ao executar consulta: " . $e->getMessage();
        }

        return null;
    }

    public static function obterHistorico($email)
    {
        $conn = Database::pdo_connect_mysql();
        $stmt = $conn->prepare("SELECT t.titulo, h.status, h.data FROM historico h INNER JOIN trabalhos t ON t.id = h.trabalho_id WHERE h.contratante_email = ? OR h.contratado_email = ?");
        $stmt->execute([$email, $email]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function atualizarUsuario($id, $email, $senha, $profissao, $nome, $telefone)
    {
        $conn = Database::pdo_connect_mysql(); 
        $stmt = $conn->prepare("UPDATE usuarios SET email = ?, senha = ?, profissao = ?, nome = ?, telefone = ? WHERE id = ?");
        $stmt->execute([$id, $email, $senha, $profissao, $nome, $telefone]);
    }

    public static function excluirUsuario($id)
    {
        $conn = Database::pdo_connect_mysql(); 
        $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
    }

    public static function obterUsuarioPorEmail($email)
    {
        $conn = Database::pdo_connect_mysql();

        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

        private $conn;
}

class Historico
{
    public static function registrar($contratanteEmail, $contratadoEmail, $trabalhoId)
    {
        $conn = Database::pdo_connect_mysql();
        $stmt = $conn->prepare("INSERT INTO historico (contratante_email, contratado_email, trabalho_id) VALUES (?, ?, ?)");
        return $stmt->execute([$contratanteEmail, $contratadoEmail, $trabalhoId]);
    }

    public static function obter($email)
    {
        $conn = Database::pdo_connect_mysql();
        $stmt = $conn->prepare("SELECT * FROM `historico` h  INNER JOIN `trabalhos` t ON t.id = h.trabalho_id  WHERE contratante_email = ? OR contratado_email = ?");
        $stmt->execute([$email, $email]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

class TrabalhoHelper
{
        private $conn;
    
        public function __construct($conn)
        {
            $this->conn = $conn;
        }
    
        public function editarTrabalho($trabalhoId, $titulo, $descricao, $preco)
        {
            try {
                $stmt = $this->conn->prepare("UPDATE trabalhos SET titulo = ?, descricao = ?, preco = ? WHERE id = ?");
                $stmt->execute([$titulo, $descricao, $preco, $trabalhoId]);
                
                // Adicione a lógica necessária após a edição (redirecionamento, exibição de mensagem, etc.)
            } catch (PDOException $e) {
                exit('Erro ao editar trabalho: ' . $e->getMessage());
            }
        }
    
        public function getTrabalhoById($trabalhoId)
        {
            $stmt = $this->conn->prepare('SELECT * FROM trabalhos WHERE id = ?');
            $stmt->execute([$trabalhoId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if (!$result) {
                header('Location: ../view/home_html.php');
                exit();
            }
    
            return $result;
        }
    public static function obterTrabalhos($search = null)
    {
        $conn = Database::pdo_connect_mysql();

        $query = "SELECT * FROM trabalhos";
        if ($search) {
            $query .= " WHERE titulo LIKE '%$search%' OR descricao LIKE '%$search%'";
        }

        $stmt = $conn->prepare($query);
        $stmt->execute();

        $trabalhos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $trabalhos;
    }
}
class DetalhesTrabalho
{
    private $trabalhoId;
    private $titulo;
    private $descricao;
    private $preco;

    public function __construct($trabalhoId)
    {
        $this->trabalhoId = $trabalhoId;
        $this->carregarDetalhesTrabalho();
    }

    private function carregarDetalhesTrabalho()
    {
        $conn = Database::pdo_connect_mysql();

        $stmt = $conn->prepare('SELECT titulo, descricao, preco FROM trabalhos WHERE id = ?');
        $stmt->execute([$this->trabalhoId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $this->titulo = $result['titulo'];
            $this->descricao = $result['descricao'];
            $this->preco = $result['preco'];
        } else {
            header('Location: ../view/home_html.php');
            exit();
        }
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getPreco()
    {
        return $this->preco;
    }
}

class Trabalho
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function adicionarTrabalho($titulo, $descricao, $preco, $email_usuario)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO trabalhos (titulo, descricao, preco, email_usuario) VALUES (?, ?, ?, ?)");
            $stmt->execute([$titulo, $descricao, $preco, $email_usuario]);
            
            return $stmt->rowCount() > 0 ? $this->conn->lastInsertId() : null;
        } catch (PDOException $e) {
            exit('Erro ao adicionar trabalho: ' . $e->getMessage());
        }
    }
}
?>