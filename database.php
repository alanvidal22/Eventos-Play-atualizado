<?php
// Conexão ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventos_sql";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
