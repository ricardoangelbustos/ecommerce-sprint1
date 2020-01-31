<?php

session_start();
include("controllers/functions.php");
$arrayErrores="";
$arrayErrores=validarLogin($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingresa con tu cuenta</title>
    <script src="https://kit.fontawesome.com/81327c1797.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style-login.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        <div class="container-login">
            <div class="header-login">
                <div class="logo">
                    <a href="index.php"><img src="img/Logo Version 1.0.png" alt="LOGO"></a>
                </div>
                <div class="page-name">
                </div>
            </div>
            <br><br>
            <div class="h1-login">
                <h1>
                    INGRESA TU EMAIL Y CONTRASEÑA
                </h1>
            </div>
            <section>
            <div class="container-1">
                    <br><br>
                    <form action="login.php" method="POST">
                        <div class="email1">
                            <div class="div">
                                <input id="email" type="text" name="email" value="" placeholder="EMAIL">
                                <small><?= (isset($arrayErrores["email"])) ? $arrayErrores["email"] : "" ?></small>
                            </div>
                        </div>
                        <div class="password-login">
                            <div class="div">
                                <input id="password" type="password" name="password" value="" placeholder="CONTRASEÑA">
                                <small><?= (isset($arrayErrores["password"])) ? $arrayErrores["password"] : "" ?></small>
                                <small><?= (isset($arrayErrores["ingreso"])) ? $arrayErrores["ingreso"] : "" ?></small><!--BORRAR ESTO-->
                            </div>
                        </div>
                        <div class="forget">
                            <a href="#">OLVIDE EL EMAIL/CONTRASEÑA</a>
                        </div>
                        <br><br>
                        <div class="create">
                            <a href="register.php">CREAR CUENTA</a>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="recordarme" name="recordarme">
                            <label class="form-check-label" for="recordarme">Recordarme como usuario</label>
                        </div>
                        <div class="button-img">
                            <!-- <a href="#"><img src="img/right-arrow.svg" alt="right-arrow"></a> -->
                            <input type="image" src=img/right-arrow.svg alt="right-arrow">
                        </div>
                    </form>
                </div>
            </section>
            <?php
            include 'includes/footer.php';
            ?>
        </div>
    </main>
</body>
</html>