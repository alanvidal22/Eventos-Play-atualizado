<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
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

$query = "SELECT nome, imagem FROM usuarios";
$result = mysqli_query($conn, $query);

$query2 = "SELECT titulo, conteudo, data, imagem_card, resumo FROM eventos";
$result2 = mysqli_query($conn, $query2);

// Segunda consulta para o carousel
$carousel_query = "SELECT titulo, resumo, imagem_card FROM eventos";
$carousel_result = mysqli_query($conn, $carousel_query);

?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid text-bg-dark p-3">
        <a class="navbar-brand" href="#" style="color:antiquewhite">Eventos Play</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="https://oraculos.ai/consultas/284805" style="color:antiquewhite">Consulta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mais_eventos.html" style="color:antiquewhite">Mais eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu.php" style="color:antiquewhite">Login</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:antiquewhite">Mais</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="agradecemos sua avaliação.html">Avalier o aplicativo</a></li>
                        <li><a class="dropdown-item" href=""></a></li>
                        <li><a class="dropdown-item" href="index.html">Sair</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Exibir informações de cada usuário -->
            <?php while ($row = mysqli_fetch_assoc($result)) { 
                $imagemGuarda = $row['imagem'];
                $imagemBase64 = file_exists($imagemGuarda) ? base64_encode(file_get_contents($imagemGuarda)) : '';
            ?>
            <div class="d-flex align-items-center" style="position:relative;left: 800px;">
                <span class="me-3"><?php echo htmlspecialchars($row['nome']); ?></span>
                <?php if ($imagemBase64) { ?>
                    <img src="data:image/jpeg;base64,<?php echo $imagemBase64; ?>" class="rounded-circle" alt="Imagem de <?php echo htmlspecialchars($row['nome']); ?>" width="80" height="80">
                <?php } else { ?>
                    <span class="text-muted">Sem imagem</span>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
</nav>
<div class="container">
<h1>Meus Eventos</h1>
<!-- Carrossel -->
<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-inner">
    <?php 
    $isFirst = true;
    while ($carousel_row = mysqli_fetch_assoc($carousel_result)) { 
        $img_carousel = base64_encode($carousel_row['imagem_card']); 
    ?>
    <div class="carousel-item <?php echo $isFirst ? 'active' : ''; ?>">
      <img src="data:image/jpeg;base64,<?php echo $img_carousel; ?>" class="d-block w-80" alt="Imagem do evento">
      <div class="carousel-caption d-none d-md-block">
        <h5><?php echo htmlspecialchars($carousel_row['titulo']); ?></h5>
        <p><?php echo htmlspecialchars($carousel_row['resumo']); ?></p>
      </div>
    </div>
    <?php $isFirst = false; } ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
<!-- Container para exibir os eventos nos cards -->
<div class="container my-4">
    <div class="row">
        <?php while ($row2 = mysqli_fetch_assoc($result2)) { ?>
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 100%;">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($row2['imagem_card']); ?>" class="card-img-top" alt="Imagem do evento" style="height:400px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row2['titulo']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($row2['conteudo']); ?></p>
                        <p class="card-text"><small class="text-muted">Data: <?php echo htmlspecialchars($row2['data']); ?></small></p>
                        <a href="formulario de cadastro de compra.html" class="btn btn-primary">Mais informações</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Footer -->
<div class="card text-bg-dark p-3">
  <h5 class="card-header">Eventos Play</h5>
  <div class="card-body">
    <h5 class="card-title">Entre contato aqui</h5>
    <p class="card-text"></p>
    <a href="contato.html" class="btn btn-primary">contato</a>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
