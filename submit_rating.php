<?php
$servername = "localhost";
$username = "root";
$password = ""; // Substitua com sua senha do banco de dados
$dbname = "eventos_sql"; // Substitua com o nome do seu banco de dados

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obtém a avaliação do formulário
$rating = isset($_POST['rating']) ? (int)$_POST['rating'] : 0;

// Insere a avaliação no banco de dados
if ($rating > 0 && $rating <= 5) {
    $stmt = $conn->prepare("INSERT INTO ratings (rating) VALUES (?)");
    $stmt->bind_param("i", $rating);
    $stmt->execute();
    $stmt->close();
} else {
    echo "Avaliação inválida.";
}

// Fecha a conexão
$conn->close();

// Redireciona para uma página de confirmação ou para o formulário original
header("Location: index.html"); // Substitua com a página desejada
exit();
?>

