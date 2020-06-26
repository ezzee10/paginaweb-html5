<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <script src="https://kit.fontawesome.com/433c7f0ebc.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/allmin.css">
  <link rel="stylesheet" href="css/lightbox.css">
  <link rel="stylesheet" href="css/colorbox.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
  <meta name="theme-color" content="#fafafa">
</head>

<?php
$archivo = basename($_SERVER['PHP_SELF']); //ESTO DEVUELVE INDEX.PHP O CONFERENCIA.PHP, ETC
$pagina = str_replace(".php", "", $archivo);
?>


<body class="<?php echo $pagina; ?>">
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->


  <header class="site-header">
    <div class="hero">
      <div class="contenido-header">
        <nav class="redes-sociales">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-pinterest"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </nav>

        <div class="informacion-evento">
          <p class="fecha"> <i class="far fa-calendar-alt"></i>10-12 Dic</p>
          <p class="ciudad"><i class="fas fa-map-marker-alt"></i>Guadalajara, MX</p>
          <h1 class="nombre-sitio">GdlWebCamp</h1>
          <p class="slogan">La mejor conferencia de <span>diseño web</span></p>
        </div>


      </div>
    </div>
  </header>

  <div class="barra">
    <div class="contenido-barra contenedor">
      <div class="imagen-barra">
        <a href="index.php">
          <img src="img/logo.svg" alt="Logo">
        </a>
      </div>

      <div class="menu-movil">
        <span></span>
        <span></span>
        <span></span>
      </div>


      <nav class="navegacion">
        <a href="conferencia.php">Conferencia</a>
        <a href="calendario.php">Calendario</a>
        <a href="invitados.php">Invitados</a>
        <a href="registro.php">Reservaciones</a>
      </nav>

    </div>
  </div>