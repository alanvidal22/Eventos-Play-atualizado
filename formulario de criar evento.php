<?php

// Encontre o erro e depois explique o código abaixo
$host = "localhost";
$username = "root";
$password = "";
$dbname = "eventos_sql";
//Explique o propósito dos códigos abaixo:
$conn = mysqli_connect($host, $username, $password,$dbname);

if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Explique os cádigos logo abaixo:
$responsavel = $_POST['responsavel'];
$evento = $_POST['evento'];
$categoria = $_POST['categoria'];
$data = $_POST['data'];
$local = $_POST['local'];
$hora = $_POST['hora'];
$duracao = $_POST['duracao'];
$seguranca = $_POST['seguranca'];
$preco = $_POST['preco'];
$atracoes = $_POST['atracoes'];
$observacao = $_POST['observacao'];

// Explique o código abaixo:
$query = "INSERT INTO  formulario_eventos (responsavel, evento, categoria, data, local, hora, duracao, seguranca, preco, atracoes, observacao) VALUES('$responsavel','$evento','$categoria','$data','$local','$hora','$duracao','$seguranca', '$preco', '$atracoes', '$observacao')";
//explique apenas o código acima
if (mysqli_query($conn, $query)) {
    header('Location: cadastro_com_sucesso.html');
} else {
    header('Location: erro_cad_usuario.html');
}

// Fechar a conexão com o banco de dados
mysqli_close($conn);

