<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "eventos_sql";

// Estabelecer a conexão
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Obter os valores dos campos do formulário e aplicar o escapamento
$titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
$conteudo = mysqli_real_escape_string($conn, $_POST['conteudo']);
$data = mysqli_real_escape_string($conn, $_POST['data']);
$resumo = mysqli_real_escape_string($conn, $_POST['resumo']);

// Processar a imagem
if (isset($_FILES["imagem"]) && !empty($_FILES["imagem"])) {
    $imagem = "./img/" . $_FILES["imagem"]["name"];
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagem);
} else {
    $imagem = "";
}

// Inserir dados no banco de dados
$query = "INSERT INTO eventos (titulo, conteudo, data, imagem_card, resumo) VALUES ('$titulo', '$conteudo', '$data', '$imagem', '$resumo')";

//explique apenas o código acima
if (mysqli_query($conn, $query)) {
    header('Location: perfil_card.php');
} else {
    header('Location: erro_cad_usuario.html');
}

// Fechar a conexão com o banco de dados
mysqli_close($conn);

?>
