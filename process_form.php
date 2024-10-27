<?php
// Configurações do banco de dados
$servername = "localhost"; // Ou o endereço do servidor do banco de dados
$username = "root"; // Nome de usuário do banco de dados
$password = ""; // Senha do banco de dados
$dbname = "eventos_sql";

// Cria conexão
$conn = mysqli_connect($host, $username, $password,$dbname);

if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Recebe dados do formulário
$responsavel = $_POST['responsavel'];
$email = $_POST['email'];
$valor_compra = $_POST['valor_compra'];
$pagamento_pix = $_POST['pagamento_pix'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$cnpj = $_POST['cnpj'];
$numero_cartao = $_POST['numero_cartao'];
$nome_cartao = $_POST['nome_cartao'];
$codigo_seguranca = $_POST['codigo_seguranca'];
$data_validade = $_POST['data_validade'];

// Prepara e vincula
$stmt = $conn->prepare("INSERT INTO compras (responsavel, email, valor_compra, pagamento_pix, telefone, cpf, cnpj, numero_cartao, nome_cartao, codigo_seguranca, data_validade) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssisssssss", $responsavel, $email, $valor_compra, $pagamento_pix, $telefone, $cpf, $cnpj, $numero_cartao, $nome_cartao, $codigo_seguranca, $data_validade);

// Executa a consulta
if ($stmt->execute()) {
    // Redireciona para a página de sucesso
    header('Location: Pagamento autentificado.html');
} else {
    // Redireciona para a página de erro (ou a mesma página de sucesso com uma mensagem)
    header('Location: Location: erro_cad_usuario.html');
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>
