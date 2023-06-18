<?php
require_once("./models/entidades/Usuario.php");
class UsuarioDAO
{
    private $conn;

    public function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=cemiterio;charset=utf8mb4";
        try {
            $this->conn = new PDO($dsn, "root", "");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro na conexão com o banco de dados: " . $e->getMessage();
        }
    }
    public function insert(Usuario $obj)
    {
        $nome = $obj->getNome();
        $email = $obj->getEmail();
        $senha = $obj->getSenha();
        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT); // Senha criptografada
        try {
            $stmt = $this->conn->prepare("INSERT INTO usuarios (id, nome, email, senha, tipo) VALUES (NULL,:nome, :email, :senha, 'user')");
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senhaCriptografada);
            $stmt->execute();
            header("Location: index.php");
        } catch (PDOException $e) {
            echo "Erro na inserção: " . $e->getMessage();
        }
    }
    public function verificaEmail($email)
    {
        try {
            $stmt = $this->conn->prepare("SELECT email FROM usuarios WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!$result) {
                return false;
            }
            return true;
        } catch (PDOException $e) {
        }
    }

    public function login($email, $senha)
    {
        if ($this->verificaEmail($email)) {
            try {
                $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE email = :email");
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($result && password_verify($senha, $result['senha'])) {
                    if ($result['tipo'] == 'user') header("Location: homeUser.php");
                    if ($result['tipo'] == 'admin') header("Location: homeAdmin.php");
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
}
