<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Verifica se o campo "nome" foi preenchido
  if (!empty($_POST["nome"])) {
    $nome = filter_var($_POST["nome"], FILTER_SANITIZE_STRING);
  } else {
    $erro = "O campo nome é obrigatório.";
  }

  // Verifica se o campo "email" foi preenchido e é um e-mail válido
  if (!empty($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $email = $_POST["email"];
  } else {
    $erro = "O campo e-mail é obrigatório e deve ser um endereço de e-mail válido.";
  }

  // Verifica se o campo "senha" foi preenchido
  if (!empty($_POST["senha"])) {
    $senha = filter_var($_POST["senha"], FILTER_SANITIZE_STRING);
  } else {
    $erro = "O campo senha é obrigatório.";
  }

  // Verifica se o checkbox "aceitar" foi marcado
  if (!empty($_POST["aceitar"])) {
    $aceitar = $_POST["aceitar"];
  } else {
    $erro = "Você deve aceitar os termos de uso e a política de privacidade para continuar.";
  }

  // Se não houver nenhum erro, envia o e-mail de cadastro para o endereço do criador
  if (empty($erro)) {
    $to = "guilhermegamabrum@.com";
    $subject = "Novo cadastro realizado";
    $message = "Um novo cadastro foi realizado no site. Seguem os dados:\n\nNome: $nome\nE-mail: $email\nSenha: $senha";
    $headers = "From: $email";
    mail($to, $subject, $message, $headers);
  }
}
?>