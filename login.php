<?php
session_start();
$errores=[];
$email="";
$password="";
$nombres=[];
$usuariosGuardados=[];
$usuarioFinal=[];
$username=[];
if (isset($_COOKIE["email"])) {
    header("Location: userprofile.php");exit;
}
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
    if (count($errores) == 0) {
        $usuariosGuardados = file_get_contents('usuarios.json');
        $usuariosGuardados = explode(PHP_EOL, $usuariosGuardados);
        array_pop($usuariosGuardados);
        foreach ($usuariosGuardados as $usuario) {
            $usuarioFinal=json_decode($usuario,true);
            if ($usuarioFinal['email'] == $_POST['email'] && password_verify($_POST['password'],$usuarioFinal['password'])) {
                //aqui si lo logeo 
                $_SESSION['email'] = $usuarioFinal['email'];
                setcookie('nombre',$usuarioFinal['nombre'],time() + 60*60*24*30);
                if (isset($_POST['recordarme'])) {
                  // creo la cookie de mantenerme logeado
                  setcookie('email',$usuarioFinal['email'],time() + 60*60*24*30);
                }
                //por ahora redirecciono a la misma vista 
                header('Location:userprofile.php');
            }
            else{
                $errores["password"]= "El usuario o la contraseña no existen";
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
                            <input id="email" type="text" name="email" value="" placeholder="EMAIL">
                            <small><?= (isset($errores["email"])) ? $errores["email"] : "" ?></small>
                        </div>
                        <div class="password-login">
                            <input id="password" type="password" name="password" value="" placeholder="CONTRASEÑA">
                            <small><?= (isset($errores["password"])) ? $errores["password"] : "" ?></small>
                            <small><?= (isset($errores["ingreso"])) ? $errores["ingreso"] : "" ?></small>
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