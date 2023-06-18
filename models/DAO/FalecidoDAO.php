<?php
require_once("./models/entidades/Falecido.php");
class FalecidoDAO
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
    public function insert(Falecido $obj)
    {
        $nome = $obj->getNome();
        $cpf = $obj->getCpf();
        $data_morte = $obj->getDataMorte();
        try {
            $stmt = $this->conn->prepare("INSERT INTO falecidos VALUES (NULL,:nome, :cpf, :data_morte)");
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':data_morte', $data_morte);
            $stmt->execute();
            echo "inseriu";
        } catch (PDOException $e) {
            echo "Erro na inserção: " . $e->getMessage();
        }
    }
    public function selectAll()
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM falecidos");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Erro na inserção: " . $e->getMessage();
        }
    }
}
