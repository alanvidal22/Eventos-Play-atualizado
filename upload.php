<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Diretório onde a imagem será armazenada
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Verifica se a imagem é realmente uma imagem
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "O arquivo é uma imagem - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "O arquivo não é uma imagem.";
            $uploadOk = 0;
        }
    }

    // Verifica se o arquivo já existe
    if (file_exists($targetFile)) {
        echo "Desculpe, o arquivo já existe.";
        $uploadOk = 0;
    }

    // Limita o tamanho do arquivo (5MB neste exemplo)
    if ($_FILES["image"]["size"] > 5000000) {
        echo "Desculpe, seu arquivo é muito grande.";
        $uploadOk = 0;
    }

    // Permite apenas certos formatos de imagem
    if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        echo "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
        $uploadOk = 0;
    }

    // Verifica se $uploadOk é 0 por algum erro
    if ($uploadOk == 0) {
        echo "Desculpe, seu arquivo não foi enviado.";
    } else {
        // Tenta fazer o upload do arquivo
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "O arquivo ". htmlspecialchars(basename($_FILES["image"]["name"])) . " foi enviado com sucesso.";
        } else {
            echo "Desculpe, ocorreu um erro ao enviar seu arquivo.";
        }
    }
}
?>

