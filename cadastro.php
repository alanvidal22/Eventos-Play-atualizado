<?php

session_start();
require_once 'database.php';
//Explique o propósito dos códigos abaixo:
$conn = mysqli_connect($host, $username, $password,$dbname);

if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Explique os cádigos logo abaixo:
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$sexo = $_POST['genero'];
$data_nascimento = $_POST['data_nascimento'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$endereco = $_POST['endereco'];
$senha = $_POST['senha'];

// Explique o código abaixo:
$query = "INSERT INTO clientes (nome, email, telefone, genero, data_nascimento, cidade, estado, endereco, senha) VALUES('$nome','$email','$telefone','$sexo','$data_nascimento','$cidade','$estado', '$endereco', '$senha')";
//explique apenas o código acima
if (mysqli_query($conn, $query)) {
    header('Location: cadastro_com_sucesso.html');
} else {
    header('Location: erro_cad_usuario.html');
}

// Fechar a conexão com o banco de dados
mysqli_close($conn);

?>
