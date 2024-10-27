<?php
// Configurações do banco de dados
$servername = "localhost"; // ou o IP do servidor
$username = "root"; // seu usuário MySQL
$password = ""; // sua senha MySQL
$dbname = "eventos_sql"; // nome do banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obtém os dados do formulário
$nome = $_POST['name'];
$email = $_POST['email'];
$mensagem = $_POST['message'];

// Prepara e executa a consulta SQL
$sql = "INSERT INTO contatos (nome, email, mensagem) VALUES('$name','$email','$message')";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nome, $email, $mensagem);

if ($stmt->execute()) {
    echo "Dados enviados com sucesso!";
} else {
    echo "Erro: " . $stmt->error;
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>

