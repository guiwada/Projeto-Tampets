<!DOCTYPE html>
<html>
<head>
  <title>Tabela de Usuários</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->	
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <!--===============================================================================================-->	
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!--===============================================================================================-->
  <style>
    body {
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }
    .container {
      text-align: center;
      width: 100%;
      max-width: 1280px;
      margin-top: 60px;
      border: 1px solid #ddd;
      border-radius: 20px;
      box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.2);
      padding: 20px;
      box-sizing: border-box;
    }
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    tr:hover {background-color: #f5f5f5;}
    .edit-button:hover{
      background-color:#13a3e0;
    }
    .delete-button:hover{
      background-color: #fd0000;
    }
    .edit-button, .delete-button {
      background-color: #238DB9;
      color: white;
      padding: 6px 12px;
      margin-left:1.25em;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .delete-button {
      background-color: #DB2F30;
    }

    .add-user-button {
      background-color:white;
      color: white;
      padding: 6px 12px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      position: fixed;
      bottom: 20px;
      right: 60px;
    }
    h2{
      padding: 10px 5px;
      color: #238DB9;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .add-user-button-container {
      display: flex;
      align-items: center;
    }
    .add-user-button-icon {
      margin-right: 5px;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2><strong>Usuários</strong>
      <div class="add-user-button-container">
        <a href="CadastroUsuario.php" >
          <button class="edit-button"> + Cadastrar novo usuário</button>
        </a>
      </div>
      <div class="add-user-button-container">
        <a href="../MainPage/mainpage.php" >
          <button class="edit-button"> Voltar Página Inicial</button>
        </a>
      </div>
    </h2>
    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Telefone</th>
          <th>E-mail</th>
          <th>Senha</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $dbname = "upx";

        $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

        $result_usuario = "SELECT * FROM usuario";

        $resultado_usuario = mysqli_query($conn, $result_usuario);
        while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {
          echo "<tr>";
          echo "<td>" . $row_usuario['nome'] . "</td>";
          echo "<td>" . $row_usuario['telefone'] . "</td>";
          echo "<td>" . $row_usuario['email'] . "</td>";
          echo "<td>" . $row_usuario['senha'] . "</td>";
          echo "<td>";
          echo "<a href='editar.php?nome=" . $row_usuario['nome'] . "' class='edit-button'><i class='fa fa-pencil' aria-hidden='true'></i></a>";
          echo "<a href='excluir.php?nome=" . $row_usuario['nome'] . "' class='delete-button'><i class='fa fa-trash' aria-hidden='true'></i></a>";
          echo "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
    
  </div>

  <!--===============================================================================================-->	
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/tilt/tilt.jquery.min.js"></script>
  <script>
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
  <!--===============================================================================================-->
  <script src="js/main.js"></script>
</body>
</html>
