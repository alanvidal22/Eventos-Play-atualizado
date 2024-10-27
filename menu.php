<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css/style.css">
    <link rel="manifest" href="manifest.webmanifest">
</head>
<body>
    <content>
        <h1>Encontre tudo<br> que precisa em <br> <span style="color: #061E60;">um só lugar!</span></h1>
        <img src="./img/images (1).jpg">
        <div id="bolinhas">
            <span id="azul"></span>
            <span class="cinza"></span>
            <span class="cinza"></span>
        </div>
    </content>
    <main>
        <div id="card">
         <span id='logo'>
            <img src="./img/images (1).jpg" logo-img></img> 
            <h2><b>Eventos Plays</b></h2>
         </span>

         <h3>Bem vindo!</h3>
<!--
         <form method="POST" action="login.php">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome do usuário" class="login" required>
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" placeholder="Insira sua senha" class="login" required>
            <div id="linha">
                <input type="checkbox" id="conect"> <span style="color: grey">Manter conectado</span>
                <u style="color: grey">Recuperar senha</u>
            </div>
        
            <div id="linha2">
                <input type="submit" value="Enviar" style="background-color: #059efe; color: #FFFFFF; border: none; padding: 8px 16px; border-radius: 4px; font-weight: bold; cursor: pointer; font-size: 1.6vh;">
                <a href="formulario.html" style="background-color: #039bfa; color: #FFFFFF; text-decoration: none; padding: 8px 16px; border-radius: 4px; display: inline-block; font-weight: bold; font-size: 1.6vh; margin-left: 10px;">CADASTRE-SE GRÁTIS</a>
            </div>
        </form>
-->
<?php
// Incluir arquivo de conexão ao banco de dados
session_start();
require_once 'database.php';

// Verificar se o usuário já está logado
if (isset($_SESSION['nome'])) {
    header('Location: perfil.php');
    exit;
}

// Processar formulário de login
if (isset($_POST['nome']) && isset($_POST['senha'])) {
    $username = $_POST['nome'];
    $password = $_POST['senha'];

    // Verificar credenciais do usuário
    $query = "SELECT * FROM clientes WHERE nome = '$username' AND senha = '$password'";
    $result = $conn->query($query);
/* O método fetch_assoc() retorna uma linha de resultado da consulta como um array associativo. Cada coluna do banco de dados será um elemento do array, onde a chave será o nome da coluna.*/
    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        /* $_SESSION['username'] = $username;: Armazena o nome de usuário na sessão. Isso permite que as informações do usuário estejam disponíveis em outras páginas.
 */
        $_SESSION['nome'] = $username;
        /* $_SESSION['name'] = $user_data['name'];: Armazena o nome completo do usuário na sessão, obtido a partir da consulta do banco de dados. */
        $_SESSION['nome'] = $user_data['nome'];
        $_SESSION['foto'] = $user_data['foto'];
        header('Location: perfil.php');
        exit;
    } else {
        $error = 'Credenciais inválidas';
    }
}
// Verificar credenciais do usuário
$query2 = "SELECT * FROM promotor WHERE nome = '$username' AND senha = '$password'";
$result2 = $conn->query($query2);
/* O método fetch_assoc() retorna uma linha de resultado da consulta como um array associativo. Cada coluna do banco de dados será um elemento do array, onde a chave será o nome da coluna.*/
if ($result2->num_rows > 0) {
    $user_data = $result2->fetch_assoc();
    /* $_SESSION['username'] = $username;: Armazena o nome de usuário na sessão. Isso permite que as informações do usuário estejam disponíveis em outras páginas.
*/
    $_SESSION['nome'] = $username;
    /* $_SESSION['name'] = $user_data['name'];: Armazena o nome completo do usuário na sessão, obtido a partir da consulta do banco de dados. */
    $_SESSION['nome'] = $user_data['nome'];
    $_SESSION['foto'] = $user_data['foto'];
    header('Location: perfil2.php');
    exit;
} else {
    $error = 'Credenciais inválidas';
}
?>

<!-- Formulário de login -->
<!--$_SERVER['PHP_SELF'] retorna o nome do arquivo PHP atual que está sendo executado. Assim, o formulário será enviado para a própria página onde ele está contido-->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="nome">Nome de usuário:</label>
    <input type="text" id="nome" name="nome"><br><br>
    <label for="senha">Senha:</label>
    <input type="senha" id="senha" name="senha"><br><br>
    <input type="submit" value="Login">
</form>

<?php if (isset($error)) { echo $error; } ?>
<!--A função isset() verifica se uma variável foi definida e se o valor dela não é null. No caso deste código, a função isset($error) está verificando se a variável $error existe e possui algum valor.-->
        <script src="app.js"></script>
    <script src="serviceWorker.js"></script>
        
        </div>
    </main>
</body>
</html>

