<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> 

    <title>Login</title>
</head>
<body>
<?php
// Incluir arquivo de conexão ao banco de dados
session_start();
require_once 'database.php';

// Verificar se o usuário já está logado
if (isset($_SESSION['username'])) {
    header('Location: perfil.php');
    exit;
}

// Processar formulário de login
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar credenciais do usuário
    $query = "SELECT * FROM clientes WHERE nome = '$username' AND senha = '$password'";
    $result = $conn->query($query);
/* O método fetch_assoc() retorna uma linha de resultado da consulta como um array associativo. Cada coluna do banco de dados será um elemento do array, onde a chave será o nome da coluna.*/
    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        /* $_SESSION['username'] = $username;: Armazena o nome de usuário na sessão. Isso permite que as informações do usuário estejam disponíveis em outras páginas.
 */
        $_SESSION['username'] = $username;
        /* $_SESSION['name'] = $user_data['name'];: Armazena o nome completo do usuário na sessão, obtido a partir da consulta do banco de dados. */
        $_SESSION['nome'] = $user_data['nome'];
        $_SESSION['foto'] = $user_data['foto'];
        header('Location: perfil.php');
        exit;
    } else {
        $error = header('Location: nome_ou_senha_incorreto.html');
    }

?>

<!-- Formulário de login -->
<!--$_SERVER['PHP_SELF'] retorna o nome do arquivo PHP atual que está sendo executado. Assim, o formulário será enviado para a própria página onde ele está contido-->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="username">Nome de usuário:</label>
    <input type="text" id="username" name="username"><br><br>
    <label for="password">Senha:</label>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" value="Login">
</form>

<?php if (isset($error)) { echo $error; } ?>
<!--A função isset() verifica se uma variável foi definida e se o valor dela não é null. No caso deste código, a função isset($error) está verificando se a variável $error existe e possui algum valor.-->

</body>
</html>