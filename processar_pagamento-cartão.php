<?php
// Configurações do banco de dados
$servername = "localhost";  // Nome do servidor do banco de dados
$username = "root";         // Nome de usuário do banco de dados
$password = "";             // Senha do banco de dados
$dbname = "eventos_sql"; // Nome do banco de dados

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi estabelecida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $numero_cartao = $_POST['numero-cartao'];
    $nome_cartao = $_POST['nome-cartao'];
    $validade = $_POST['validade'];
    $cvv = $_POST['cvv'];

    // Prepara a consulta SQL para inserir os dados no banco de dados
    $sql = "INSERT INTO compra_cartao (nome, email, telefone, cep, endereco, numero_cartao, nome_cartao, validade, cvv)
            VALUES ('$nome', '$email', '$telefone', '$cep', '$endereco', '$numero_cartao', '$nome_cartao', '$validade', '$cvv')";

  // Executa a consulta e verifica se foi bem-sucedida
  if ($conn->query($sql) === TRUE) {
    // Redireciona para a página de sucesso
    header("Location: Pagamento autentificado.html");
    exit();
} else {
    echo "Erro ao registrar pagamento: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();
}
?>




