<?php
class DatabaseConnection
{
    private $conn;

    public function __construct($servidor, $usuario, $senha, $dbname)
    {
        $this->conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

        if (!$this->conn) {
            die("Falha na conexão: " . mysqli_connect_error());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

class UserRepository
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function deleteUser($nome)
    {
        $nome = mysqli_real_escape_string($this->conn, $nome);

        $sql = "DELETE FROM usuario WHERE nome = '$nome'";
        if (mysqli_query($this->conn, $sql)) {
            header("location: Usuarios.php");
        } else {
            echo "Erro ao excluir usuário: " . mysqli_error($this->conn);
        }
    }
}

$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "upx";

$database = new DatabaseConnection($servidor, $usuario, $senha, $dbname);
$conn = $database->getConnection();

$userRepository = new UserRepository($conn);

$nome = $_GET['nome'];

$userRepository->deleteUser($nome);

mysqli_close($conn);
