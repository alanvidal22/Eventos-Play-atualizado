<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        
    <title>Document</title>
</head>
<body>
<?php
    // Incluir arquivo de conexão ao banco de dados e iniciar uma session
    session_start();
    require_once 'database.php';

    // Verificar se o usuário está logado
    if (!isset($_SESSION['nome'] ) ) {
        header('Location: menu.php');
        exit;
    }

    // Mostrar informações do usuário
    $name = $_SESSION['nome'];
    $image = $_SESSION['foto'];
   

    ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid" style="background-color:blue;">
  <a class="navbar-brand" href="#"><img src="./img/images (1)X.jpg" style="width:40%;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link"href="index.html" style="color:#fff;">Sair</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://oraculos.ai/consultas/284805" style="color:#fff;">Consulta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contato.html" style="color:#fff;">Ajuda</a>
        </li>
        </li>
       <li class="nav-item">
          <a class="nav-link" href="perfil_card.php" style="color:#fff;">Ver Eventos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
        <div class="custom-upload">
                    <button onclick="document.getElementById('upload').click()">Alterar Imagem</button>
                    <input type="file" id="upload" accept="image/*" onchange="previewImage(event)">
                </div>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search">
        <button class="btn btn-outline-success" type="submit" style="color:#fff;">Pesquisar</button>
      </form>
      <h4 class="titulo" style="margin:5px;color:#fff;"><?php echo $name; ?></h4>
      <img class="imagem-perfil" src="data:imagens/jpeg;base64,<?php echo base64_encode($image); ?>" alt="<?php echo $name; ?>" style="width:7%; border-radius:50%;margin:5px;">
    </div>
  </div>
</nav>
<div class="container-sm">
<h1>cliente (a) seja bem vindo ao nosso aplicativo</h1>
<div class="container-sm">
<h1>Acesse aos eventos</h1>
<div class="row" style="margin-top:10%;">
<div class="col">
<div class="card" style="width: 18rem;">
  <img src="./img/img1.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">O esporte une pessoas e trasforma desafios em conquistas</p>
    <a  href= "aplicativo_esportes.html">Clique aqui</a>

  </div>
</div>
</div>
<div class="col">
<div class="card" style="width: 18rem;">
  <img src="./img/img2.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">Réveillon é a celebração de novos começos e esperanças renovadas</p>
    <a  href="réveillon.html" >Clique aqui</a>
  </div>
</div>
</div>
<div class="col">
<div class="card" style="width: 18rem;">
  <img src="./img/img3.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">Passear é descobrir novos horizontes e viver aventuras inesquecíveis.</p>
    <a  href="passeios_e_turs.html" >Clique aqui</a>
  </div>
</div>
</div>
  <div class="col">
    <div class="card" style="width: 18rem;">
      <img src="./img/img4.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <p class="card-text">Show e festas: momentos de alegria que ficam na memória.</p>
        <a  href="show_e_festas.html" >Clique aqui</a>
      </div>
    </div>
      </div>
      <div class="col">
        <div class="card" style="width: 18rem;">
          <img src="./img/palestra.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text">Palestras inspiram e abrem novas perspectivas.</p>
            <a  href="palestras.html" >Clique aqui</a>
          </div>
        </div>
      </div>
          <div class="col">
            <div class="card" style="width: 18rem;">
              <img src="./img/mesa redonda.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Mesa redonda: onde ideias se encontram e se transformam.</p>
                <a  href="mesa_redonda.html" >Clique aqui</a>
              </div>
            </div>
          </div>
              <div class="col">
                <div class="card" style="width: 18rem;">
                  <img src="./img/reunião.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <p class="card-text">Reuniões: o espaço para unir ideias e tomar decisões.</p>
                    <a  href="reuniões.html" >Clique aqui</a>
                  </div>
                </div>
              </div>
                  <div class="col">
                    <div class="card" style="width: 18rem;">
                      <img src="./img/exposições.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <p class="card-text">Exposições: revelam talentos e contam histórias através da arte.</p>
                        <a  href="exposições.html" >Clique aqui</a>
                      </div>
                    </div>
                  </div>
                      <div class="col">
                        <div class="card" style="width: 18rem;">
                          <img src="./img/img8-x.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <p class="card-text">Eventos gastronômico: uma festa para os sentidos e uma celebração da cultura.</p>
                            <a  href="eventos_gastronômico.html" >Clique aqui</a>
                          </div>
                        </div>
                      </div>
                          <div class="col">
                            <div class="card" style="width: 18rem;">
                              <img src="./img/img6.jpg" class="card-img-top" alt="...">
                              <div class="card-body">
                                <p class="card-text">Evento artistico: onde a criatividade ganha vida e emociona.</p>
                                <a  href="aplicativo_artisticos.html" >Clique aqui</a>
                              </div>
                            </div>
                          </div>
                              <div class="col">
                                <div class="card" style="width: 18rem;">
                                  <img src="./img/img8.jpg" class="card-img-top" alt="...">
                                  <div class="card-body">
                                    <p class="card-text">Eventos infantis: pura alegria e magia para os pequenos.</p>
                                    <a  href="eventos_infantis.html" >Clique aqui</a>
                                  </div>
                                </div>
                              </div>
                                  <div class="col">
                                    <div class="card" style="width: 18rem;">
                                      <img src="./img/Evento religioso.jpg" class="card-img-top" alt="...">
                                      <div class="card-body">
                                        <p class="card-text">Eventos religioso: um momento de fé e comunhão que renova o espírito.</p>
                                        <a  href="aplicativo_religioso.html" >Clique aqui</a>
                                      </div>
                                      </div>
    </div>
</div>
</div>
</div>
</div>


</div>
</div>
</div>
</div>
    <!--Bootstrap Javascript-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
crossorigin="anonymous">
</script>   
</main>

    <footer>  
        <div class="card-final">
            <span class="title-final">CIDADES</span>
            <ul>
                <li>Natal-RN</li>
                <li>João Pessoa-PB</li>
                <li>Fortaleza-CE</li>
                <li>Recife-PE</li>
            </ul>
        </div>
        <div class="card-final">
            <span class="title-final">SERVIÇOS</span>
            <ul>
                <li>Eventos artísticos</li>
                <li>Passeios turísticos</li>
                <li>Baladas</li>
                <li>Reservas</li>
            </ul>
        </div>
        <div class="card-final">
            <span class="title-final"> CONTATOS</span>
            <ul>
                <li>Carlos Roberto Gomes da Silva</li>
                <li>84 99460-8814</li>
                <li>calosroberto@gmail.com</li>
            </ul>
        </div>
        
           
        </div>
        <style>
        footer {
            background-color: rgb(0, 76, 255);
            color: rgb(255, 255, 255);
            width: 100%;
            padding: 10px 0;
        }
        .footer-nav {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
        }
        .footer-nav li {
            margin: 0 15px;
        }
        .footer-nav img {
            width: 24px; /* Ajuste o tamanho conforme necessário */
            height: 24px; /* Mantém a proporção */
        }
        .card-final {
    display: flex;
    flex-direction: column;
    width: 240px;
    justify-content: center;
    margin: 20px;
}

footer {
    background-color: rgb(0, 76, 255);
    color: rgb(255, 255, 255);
    width: 100%;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.title-final {
    width: 220px;
    height: 20px;
    background-color: rgb(0, 72, 255);
    color: rgb(255, 255, 255);
    margin-bottom: 10px;
    padding: 5px;
    font-size: 15px;
}

li {
    color: rgb(255, 255, 255);
    font-size: 12px;
    margin-left: 25px;
}

.icones {
    display: flex;
    flex-wrap: wrap;
    margin-top: 20px;
    justify-content: center;
}

.icon-final {
    width: 20px;
    height: 20px;
    border: 1px solid rgb(0, 119, 255);
    border-radius: 50%;
    background-color: rgb(255, 255, 255);
    margin: 5px;
}

#rights {
    color: rgb(251, 253, 255);
    font-size: 12px;
    margin-top: 10px;
}

#pesquisa{
     border-radius:100px;
     

}

@media only screen and (max-width: 768px) {
    header {
        flex-direction: column;
        align-items: center;
    }

    nav {
        margin-top: 10px;
        flex-direction: column;
        align-items: center;
	background-color: rgb(250, 250, 250);
	width: 100%;

    }

    nav a {
        padding: 10px;
	color: rgb(255, 255, 255);	
    }

    #search {
        margin-left: 0;
        margin-top: 10px;
    }

    footer {
        flex-direction: column;
        align-items: center;
    }

    .cards {
        width: calc(50% - 40px);
        height: auto;
        margin: 10px;
    }

    .card {
        padding: 10px;
    }

    .img {
        width: 60px;
        height: 60px;
    }

    .txt {
        font-size: 10px;
        margin: 15px;
    }
}

a{
    font-size: 13px;
    color: rgb(72, 72, 194);
    font-weight: 800;
    margin-top: auto;
  }

  
    </style>
</head>
<body>
    <!-- Seu conteúdo anterior aqui... -->

    <footer>
        <nav>
            <ul class="footer-nav">
                <li><a href="#"><img src="https://cdn2.iconfinder.com/data/icons/ui-kit-developer-glyphs/16/GlyphIcons-Home-512.png" alt="Home"></a></li>
                <li><a href="#"><img src="https://static.vecteezy.com/system/resources/thumbnails/022/186/053/small/alert-design-info-sign-pro-icon-isolate-with-black-background-png.png" alt="Sobre"></a></li>
                <li><a href="#"><img src="https://cdn-icons-png.flaticon.com/512/75/75668.png" alt="Serviços"></a></li>
                <li><a href="#"><img src="https://cdn-icons-png.freepik.com/256/455/455705.png" alt="Contato"></a></li>
            </ul>
        </nav>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <footer>
   
    <script src="app.js"></script>
    <script src="serviceWorker.js"></script>

</body>
</html>