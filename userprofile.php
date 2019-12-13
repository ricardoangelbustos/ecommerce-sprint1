<?php
if (!isset($_COOKIE["email"])) {
    header("Location: login.php");exit;
}

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
    <style>
    /* MODIFICA EL EMAIL QUE SE MUEVE Y NI IDEA POR QUE */
    .email{
        color: orange;
        text-decoration: none;
    }
    .email a:hover{
        transition: 500ms;
	    color: #62d1ec;
    }
    /*HASTA ACA */
    </style>
</head>
<body>
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
                        <a href="userprofile.php">NOMBRE</a>
                    </h3>
                </div>
                <div class="account">
                    <a href="userprofile.php"><img src="img/account.svg" alt="account"></a>
                </div>
            </div>
        </header>
        <section>
            <div class="container-three-parts">
                <div class="option-left">
                    <div class="my-account">
                        <a href="logout.php">DESLOGUEARSE</a>
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
                </div>
                <div class="general-center">
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
                </div>
                <div class="separator">
                </div>
                <div class="option-right">
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
                </div>
            </div>
        </section>
        <?php
        include 'includes/footer.php';
        ?>
            </div>
        </body>
        </html>
        