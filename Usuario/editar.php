<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "upx";

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

if (!$conn) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "UPDATE usuario SET nome=?, telefone=?, email=?, senha=? WHERE nome=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssss", $nome, $telefone, $email, $senha, $nome);
if (mysqli_stmt_execute($stmt)) {
    header("location: Usuarios.php");
} else {
    echo "Erro ao atualizar usuário: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);


    mysqli_close($conn);
} else {
    $nome = $_GET['nome'];
    $sql = "SELECT * FROM usuario WHERE nome='$nome'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cadastro</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="img/LogoTampets.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <span class="login100-form-title">
                        Cadastro de Usuário
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Nome completo">
                        <input class="input100" type="text" name="nome" value="<?php echo $row["nome"]; ?>" placeholder="Nome Completo">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Telefone Necessário">
                        <input class="input100" type="tel" name="telefone" value="<?php echo $row["telefone"]; ?>" placeholder="Telefone">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Necessário adicionar Email: ex@abc.xyz">
                        <input class="input100" type="email" name="email" value="<?php echo $row["email"]; ?>" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Senha necessária">
                        <input class="input100" type="password" name="senha" value="<?php echo $row["senha"]; ?>" placeholder="Senha">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <input type="submit" class="login100-form-btn" value="Atualizar">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>


<?php
    } else {
        echo "Usuário não encontrado";
    }
}
?>
