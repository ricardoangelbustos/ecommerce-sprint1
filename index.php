<?php
session_start();
if (isset($_SESSION["email"])) {
        $nombre = $_COOKIE["nombre"];
        $dir1 = "userprofile.php";
        $botonnav = "MI CARRITO";
        $dir2 = "cart.php";
        $dir3 = "cart.php";
    }   
else{
    $nombre = "LOGIN";
    $dir1 = "login.php";
    $botonnav ="SIGN UP";
    $dir2 = "register.php";
    $dir3 = "login.php";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css\style-home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/43e0e665da.js" crossorigin="anonymous"></script>
    <title>Bienvenidos</title>
</head>
<body>

    <div class="container">
        <header class="header">
            <div class="logo">
                    <a href="index.php"><img src="img/Logo Version 1.0.png" alt="logo"></a>
            </div>
            <div class="dropdown">
                 <button class="dropbtn">CATEGORÍAS <i class="fas fa-angle-down" style="display:inline"></i></button>
                <div class="dropdown-content">
                <a href="#">REMERAS</a>
                <a href="#">PANTALONES</a>
                <a href="#">ZAPATILLAS</a>
                <a href="#">BUZOS</a>
                <a href="#">MEDIAS</a>
                <a href="#">CAMPERAS</a>
                </div>
              </div>
              <div class="search">
                <input type="search" name="search" id="search" placeholder=" BUSCAR PRODUCTOS, MARCAS Y MAS">
            </div>
            <div class="botonnav1">
                <a class="botonnav1" href="<?= $dir1?>"> <?= $nombre?> </a>
            </div>
            <div class="botonnav2">
                <a href="<?= $dir2?>"><?= $botonnav?></a>
            </div>
        </header>
        <div class="header-movil">
                <a class="logo" href="index.php"><img src="Logo Version 1.0.png" alt="logo"></a>
                <div class="search">
                    <input type="search" name="search" id="search" placeholder=" BUSCAR PRODUCTOS, MARCAS Y MAS">
                </div>
                <input class="menu-btn" type="checkbox" id="menu-btn" />
                <label class="menu-icon" for="menu-btn"><span class="nav-icon"></span></label>
                <ul class="menu">
                    
                    <li>
                      <div class="categorias-nav">
                      <a href="#">REMERAS</a>
                      <a href="#">PANTALONES</a>
                      <a href="#">ZAPATILLAS</a>
                      <a href="#">BUZOS</a>
                      <a href="#">MEDIAS</a>
                      <a href="#">CAMPERAS</a>
                      </div>
                    </li>
                </ul>
                <a href="<?= $dir3?>"><i class="fas fa-shopping-cart"></i></a>
                <a href="<?= $dir1?>"><i class="fas fa-user-circle"></i></a>
        </div>
      <img class="img1" src="img/Image_1_A0_Rectangle_6_pattern@2x.PNG" alt="slider1">
      <img class="img1M" src="img/Zapatillas_A9_Rectangle_11_pattern@2x.png" alt="slider1">
      <h2 class="tendencias-title">TENDENCIAS</h2>
          <img class="img2M" src="img/Image_3_A9_Rectangle_14_pattern@2x.png" alt="tendencia1movil">
      <div class="tendenciasM"></div>
          <img class="img3M" src="img/Image_4_A9_Rectangle_16_pattern@2x.png" alt="tendenica2movil">
      <h2 class="title-categoriasM">CATEGORIAS</h2>
      <div class="categoriasM">
      <div class="catbox"><p>REMERAS</p></div>
      <div class="catbox"><p>PANTALONES</p></div>
      <div class="catbox"><p>ZAPATILLAS</p></div>
      <div class="catbox"><p>BUZOS</p></div>
      <div class="catbox"><p>MEDIAS</p></div>
      <div class="catbox"><p>CAMPERAS</p></div>
    </div>
      <div class="tendencias">
      <div class="box-t1"><img class="img2" src="img/Image_2_A0_Rectangle_19_pattern@2x.PNG" alt="tendencia1"></div>
      <div class="box-t2"><img class="img3" src="img/Image_3_A0_Rectangle_21_pattern@2x.PNG" alt="tendencia2"></div>
      <div class="box-t3"><img class="img4" src="img/Image_4_A0_Rectangle_23_pattern@2x.PNG" alt="tendencia3"></div>
      </div>
      <h3 class="lazaminetos-title">
          ULTIMOS LANZAMIENTOS
      </h3>
      <section>
          <div class="similar">
              <div class="similar-product">
                  <img src="img/Image_5_A0_Rectangle_25_pattern@2x.png" alt="5">
                  <h3>
                      REMERA X
                  </h3>
              </div>
              <div class="similar-product">
                  <img src="img/Image_6_A0_Rectangle_27_pattern@2x.png" alt="6">
                  <h3>
                      BUZO X
                  </h3>
              </div>
              <div class="similar-product">
                  <img src="img/Image_7_A0_Rectangle_29_pattern@2x.png" alt="7">
                  <h3>
                      PANTALON X
                  </h3>
              </div>
              <div class="similar-product">
                  <img src="img/Image_8_A0_Rectangle_31_pattern@2x.png" alt="8">
                  <h3>
                      ZAPATILLA X
                  </h3>
              </div>
          </div>
    <div class="recomendacionesM">
        <h3>INSPIRADO EN LO ULTIMO QUE VISTE</h3>
        <div class="boxrec">
            <img class="boxrecimg" src="img/Image_6_A9_Rectangle_25_pattern@2x.png" alt=" img-recomendacion">
            <p>BUZO X 2500$</p>
        </div>
        <div class="boxrec">
            <img class="boxrecimg" src="img/Image_5_A9_Rectangle_31_pattern@2x.png" alt=" img-recomendacion">
            <p>REMERA X 850$</p>
        </div>
        <div class="boxrec">
            <img class="boxrecimg" src="img/Image_7_A9_Rectangle_27_pattern@2x.png" alt=" img-recomendacion">
            <p>PANTALON X 1500$</p>
        </div>
        <div class="boxrec">
            <img class="boxrecimg" src="img/Image_8_A9_Rectangle_29_pattern@2x.png" alt=" img-recomendacion">
            <p>ZAPATILLAS X 2800$</p>
        </div>
    </div>

    <div class="historialM">
        <h3>VISTO RECIENTEMENTE</h3>
        <div class="boxhist">
        <img src="img/Image_11_A9_Rectangle_34_pattern@2x.png" alt="img-historial">
            <p>ZAPATILLA ULTRA X 3599.99$</p>
        </div>
        <h3 style="color: #3e64ff;">ver historial de busquedas</h3>
    </div>

      </section>
      <?php
            include 'includes/footer.php';
        ?>
    </div>

</body>
</html>
