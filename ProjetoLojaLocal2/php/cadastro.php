<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $to = 'guilhermegamabrum@gmail.com';
  $subject = 'Novo cadastro';

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $data_nascimento = $_POST['data_nascimento'];
  $confirmar_senha = $_POST['confirmar_senha'];
  $telefone = $_POST['telefone'];
  $genero = $_POST['genero'];

  $message = "Nome: $nome\n";
  $message .= "E-mail: $email\n";
  $message .= "Senha: $senha\n";
  $message .= "Data de nascimento: $data_nascimento\n";
  $message .= "Telefone: $telefone\n";
  $message .= "Gênero: $genero\n";

  $headers = 'From: ' . $email . "\r\n" .
             'Reply-To: ' . $email . "\r\n" .
             'X-Mailer: PHP/' . phpversion();

  try {
    if(mail($to, $subject, $message, $headers)) {
      echo 'Cadastro enviado com sucesso.';
    } else {
      throw new Exception('Erro ao enviar cadastro.');
    }
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}
?>
