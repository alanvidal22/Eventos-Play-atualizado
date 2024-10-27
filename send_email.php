
<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";  // Substitua pelo seu nome de usuário do banco de dados
$password = "";      // Substitua pela sua senha do banco de dados
$dbname = "eventos_sql"; // Substitua pelo nome do seu banco de dados

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recebe os dados do formulário
$nome = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$mensagem = $_POST['message'] ?? '';

// Prepara e executa a consulta
$sql = "INSERT INTO contatos (nome, email, mensagem) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

// Verifica se a preparação da consulta foi bem-sucedida
if ($stmt === false) {
    die("Erro na preparação da consulta: " . $conn->error);
}

// Verifica se a quantidade de parâmetros está correta
if (!$stmt->bind_param("sss", $nome, $email, $mensagem)) {
    die("Erro na vinculação dos parâmetros: " . $stmt->error);
}

// Executa a consulta
if ($stmt->execute()) {
    echo "Dados enviados com sucesso!";
} else {
    echo "Erro: " . $stmt->error;
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>
