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

class Authenticator
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function authenticate($email, $senha)
    {
        $email = mysqli_real_escape_string($this->conn, $email);
        $senha = mysqli_real_escape_string($this->conn, $senha);

        $query = "SELECT * FROM usuario WHERE email='$email' AND senha='$senha'";
        $result = mysqli_query($this->conn, $query);

        if ($result && mysqli_num_rows($result) == 1) {
            session_start();
            $_SESSION['email'] = $email;
            header("Location: ../MainPage/mainpage.php");
            exit();
        } else {
            header("Location: index.php?erro=1&mensagem=Usuário ou senha incorretos");
            exit();
        }
    }
}

$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "upx";

$database = new DatabaseConnection($servidor, $usuario, $senha, $dbname);
$conn = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $authenticator = new Authenticator($conn);
    $authenticator->authenticate($email, $senha);
}

?>
