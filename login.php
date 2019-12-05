<?php
session_start();
$errores=[];
$email="";
$password="";
$usuariosGuardados=[];
$usuarioFinal=[];
var_dump($_SESSION);
var_dump($_COOKIE);
if ($_POST) {
    if (isset($_POST["email"])) {
        if (empty($_POST["email"])) {
            $errores["email"]= "El campo email es obligatorio";
        }
        elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $errores["email"]="No es un email valido";
        }
        else {
            $email=$_POST["email"];
        }
    }
    if (isset($_POST["password"])) {
        if (empty($_POST["password"])) {
            $errores["password"]= "El campo contraseña es obligatorio";
        }
        elseif (strlen($_POST["password"])<=7) {
            $errores["password"]= "La contraseña debe contener mas de 8 caracteres";
        }
    }
    /* if (count($errores) == 0) {
        header("Location: index.html");
    } CUALQUIER PROBLEMA DESCOMENTAR ESTO*/
    if (count($errores) == 0) {
        $usuariosGuardados = file_get_contents('usuarios.json');
        $usuariosGuardados = explode(PHP_EOL, $usuariosGuardados);
        array_pop($usuariosGuardados);
        foreach ($usuariosGuardados as $usuario) {
            $usuarioFinal=json_decode($usuario,true);
            /* if (($usuarioFinal["email"] == $_POST["email"]) && (password_verify($_POST["password"],$usuarioFinal["password"]))) {
                header("Location: index.html");
            }
            elseif ($usuarioFinal["email"] != $_POST["email"]){
                $errores["ingreso"]="El email es incorrecto";
            }
            else{
                $errores["ingreso"]="La contraseña es incorrecta";
            } */
            if ($usuarioFinal["email"] == $_POST["email"]) {
                if (password_verify($_POST["password"],$usuarioFinal["password"])) {
                    $_SESSION["emailUsuario"] = $usuarioFinal["email"];
                    if (isset($_POST["recordarme"]) && $_POST["recordarme"] == "on") {
                        setcookie('emailUsuario', $usuarioFinal['email'], time() + 60 * 60 * 24 * 7);
                        setcookie('passUsuario', $usuarioFinal['password'], time() + 60 * 60 * 24 * 7);
                    }
                    header("Location: userprofile.php");
                }
            }
            elseif ($usuarioFinal["email"] != $_POST["email"]){
                $errores["ingreso"]="El email o la contraseña son incorrectos";
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingresa con tu cuenta</title>
    <script src="https://kit.fontawesome.com/81327c1797.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styleLOGIN.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <style>
    small{
        font-size: 20px;
        color: red;
        display: block;
        font-weight: 800;
    
    }
    .form-check{
        margin-left:50px;
        font-size: 20px;
    }
    </style>
</head>
<body>
    <div class="container-login">
        <div class="header-login">
            <div class="logo">
                <a href="index.html"><img src="img/Logo Version 1.0.png" alt="LOGO"></a>
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
                    <div class="email">
                        <input id="email" type="text" name="email" value="" placeholder="EMAIL">
                        <small><?= (isset($errores["email"])) ? $errores["email"] : "" ?></small>
                    </div>
                    <div class="password-login">
                        <input id="password" type="password" name="password" value="" placeholder="CONTRASEÑA">
                        <small><?= (isset($errores["password"])) ? $errores["password"] : "" ?></small>
                        <small><?= (isset($errores["ingreso"])) ? $errores["ingreso"] : "" ?></small><!--BORRAR ESTO-->
                    </div>
                    <div class="forget">
                        <a href="#">OLVIDE EL EMAIL/CONTRASEÑA</a>
                    </div>
                    <br><br>
                    <div class="create">
                        <a href="register.html">CREAR CUENTA</a>
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
        <footer class="footer-distributed">
            <div class="footer-left">
                <img src="img/Logo Version 1.0.png">
                <h3>About<span>AↃBA</span></h3>
                <p class="footer-links">
                    <a href="index.html">Home</a>
                    |
                    <a href="#">Blog</a>
                    |
                    <a href="about.html">About</a>
                    |
                    <a href="contact.html">Contact</a>
                </p>
                <p class="footer-company-name">© 2019 ACBA.</p>
            </div>
            <div class="footer-center">
                <div>
                    <i class="fa fa-map-marker"></i>
                    <p><span>309 - Santa Fe,
                        Bldg. No. A - 1</span>
                        Buenos Aires, CABA - 400710</p>
                    </div>
                    <div>
                        <i class="fa fa-phone"></i>
                        <a href="tel:+91 22-27782183" class="phone">+91 22-27782183</a>
                    </div>
                    <div>
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:support@ACBA.com" class="maillogin">support@ACBA.com</a>
                    </div>
                </div>
                <div class="footer-right">
                    <p class="footer-company-about">
                        <span>About the company</span>
                        We offer clothes from the most recognized brands in the world.</p>
                        <div class="footer-icons">
                            <a href="https://www.facebook.com"><i class="fab fa-facebook"></i></a>
                            <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.linkedin.com"><i class="fab fa-linkedin"></i></a>
                            <a href="https://www.youtube.com"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </footer>
            </div>
        </body>
        </html>
        