<?php
session_start();
include("controllers/functions.php");
$nombre=redireccion($_COOKIE, $_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil</title>
    <script src="https://kit.fontawesome.com/81327c1797.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style-userprofile.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        <div class="container">
            <header>
                <div class="header">
                    <div class="logo">
                        <a href="index.php"><img src="img/Logo Version 1.0.png" alt="logo"></a>
                    </div>
                    <div class="dropdown-categories">
                        <h3>
                            CATEGORIAS
                        </h3>
                    </div>
                    <div class="search">
                        <input type="search" name="search" id="search" placeholder="BUSCAR PRODUCTOS, MARCAS Y MAS">
                    </div>
                    <div class="cart">
                        <a href="cart.php"><img src="img/shopping-cart-solid.svg" alt="shopping-bag-solid"></a>
                    </div>
                    <div class="user-name">
                        <h3>
                            <a href="userprofile.php">Bienvenido <?= $nombre ?></a>             
                        </h3>
                    </div>
                    <div class="account">
                        <a href="userprofile.php"><img src="img/account.svg" alt="account"></a>
                    </div>
                    <div class="logout">
                        <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
                    </div>
                </div>
            </header>
            <section>
                <div class="container-three-parts">
                    <div class="option-left">
                        <aside>
                            <div class="my-account">
                                <div>
                                    <img src="img/account.svg" alt="account">
                                </div>
                                <button class="boton-1"><p>MI CUENTA</p></button>
                            </div>
                            <div class="purchase">
                                <div>
                                    <img src="img/shopping-bag-solid.svg" alt="shopping-bag-solid">
                                </div>
                                <button class="boton-2"><p>COMPRAS</p></button>
                            </div>
                            <div class="sale">
                                <div>
                                    <img src="img/sales2.png" alt="sales2">
                                </div>
                                <button class="boton-3"><p>VENTAS</p></button>
                            </div>
                            <div class="reputation">
                                <div>
                                    <img src="img/medal-solid.svg" alt="medal-solid">
                                </div>
                                <button class="boton-4"><p>REPUTACION</p></button>
                            </div>
                            <div class="configuration">
                                <div>
                                    <img src="img/cog-solid.svg" alt="">
                                </div>
                                <button class="boton-5"><p>CONFIGURACION</p></button>
                            </div>
                        </aside>
                    </div>
                    <div class="general-center">
                        <section>
                            <h2>
                                RESUMEN
                            </h2>
                            <div class="questions">
                                <h3>
                                    <img src="img/comments-solid.svg" alt="comments-solid">PREGUNTAS
                                </h3>
                                <div class="questions-separator"></div>
                                <p>
                                    NO TIENES PREGUNTAS SIN RESPONDER
                                </p>
                            </div>
                            <div class="shop">
                                <h2>
                                    <img src="img/shopping-bag-solid.svg" alt="shopping-bag-solid"> COMPRAS
                                </h2>
                                <h3>
                                    ESTADO
                                </h3>
                                <div class="questions-separator"></div>
                                <h3>
                                    ACTIVAS
                                </h3>
                                <div class="questions-separator"></div>
                                <h3>
                                    PAUSADAS
                                </h3>
                                <div class="questions-separator"></div>
                                <h3>
                                    FINALIZADAS
                                </h3>
                                <div class="questions-separator"></div>
                            </div>
                        </section>
                    </div>
                    <div class="separator">
                    </div>
                    <div class="option-right">
                        <aside>
                            <h2>
                                FAVORITOS
                            </h2>
                            <div class="favorite-container">
                                <div class="favorite1">
                                    <img src="img/camisaceleste.png" alt="camisaceleste">
                                    <div class="favorite-text">
                                        <h6>
                                            CAMISA X
                                        </h6>
                                        <h3>
                                            $20 USD
                                        </h3>
                                        <h6>
                                            AGREGAR AL CARRITO
                                        </h6>
                                        <span>
                                            ELIMINAR
                                        </span>
                                    </div>
                                </div>
                                <div class="favorite1">
                                    <img src="img/shortgris.png" alt="shortgris">
                                    <div class="favorite-text">
                                        <h6>
                                            PANTALON X
                                        </h6>
                                        <h3>
                                            $20 USD
                                        </h3>
                                        <h6>
                                            AGREGAR AL CARRITO
                                        </h6>
                                        <span>
                                            ELIMINAR
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </section>
            <?php
            include 'includes/footer.php';
            ?>
        </div>
    </main>  
</body>
</html>