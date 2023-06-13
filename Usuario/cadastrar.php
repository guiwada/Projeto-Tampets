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

    public function createUser($nome, $telefone, $email, $senha)
    {
        $nome = mysqli_real_escape_string($this->conn, $nome);
        $telefone = mysqli_real_escape_string($this->conn, $telefone);
        $email = mysqli_real_escape_string($this->conn, $email);
        $senha = mysqli_real_escape_string($this->conn, $senha);

        $result_usuario = "INSERT INTO usuario (nome, telefone, email, senha) VALUES ('$nome', '$telefone', '$email', '$senha')";

        if (mysqli_query($this->conn, $result_usuario)) {
            header("location: Usuarios.php");
        } else {
            echo "Erro ao cadastrar: " . mysqli_error($this->conn);
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

$nome = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

$userRepository->createUser($nome, $telefone, $email, $senha);

mysqli_close($conn);
