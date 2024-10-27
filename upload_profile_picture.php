<?php
session_start();

if (!isset($_SESSION['id'])) {
    die("Usuário não está autenticado.");
}

$usuario = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['profile-picture']) && $_FILES['profile-picture']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profile-picture']['tmp_name'];
        $fileName = $_FILES['profile-picture']['name'];
        $fileSize = $_FILES['profile-picture']['size'];
        $fileType = $_FILES['profile-picture']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        
        // Defina as extensões permitidas e o tamanho máximo do arquivo
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $maxFileSize = 2 * 1024 * 1024; // 2MB
        
        if (in_array($fileExtension, $allowedExtensions) && $fileSize <= $maxFileSize) {
            // Define o caminho para salvar a imagem
            $uploadFileDir = './uploads/';
            $dest_path = $uploadFileDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                // Atualiza a imagem no banco de dados
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "eventos";
                $conn = mysqli_connect($servername, $username, $password, $dbname);

                if (!$conn) {
                    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
                }

                $sql = "UPDATE clientes SET foto = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('si', $dest_path, $usuario);

                if ($stmt->execute()) {
                    echo "Imagem de perfil atualizada com sucesso.";
                } else {
                    echo "Erro ao atualizar a imagem de perfil: " . $stmt->error;
                }

                $stmt->close();
                $conn->close();
            } else {
                echo "Não foi possível mover o arquivo para o diretório de upload.";
            }
        } else {
            echo "Tipo de arquivo inválido ou tamanho do arquivo excede o limite.";
        }
    } else {
        echo "Erro ao fazer upload do arquivo.";
    }
}
?>
