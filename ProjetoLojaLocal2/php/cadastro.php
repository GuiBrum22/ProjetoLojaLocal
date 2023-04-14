<?php
// Conexão com o banco de dados MySQL
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Conexão falhou: " . mysqli_connect_error());
}

// Processamento do formulário de cadastro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $senha = $_POST["senha"];

  // Inserção do novo usuário na tabela do banco de dados
  $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
  if (mysqli_query($conn, $sql)) {
    echo "Cadastro realizado com sucesso!";
  } else {
    echo "Erro ao cadastrar: " . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>