<?php

//INICIA CONEXION A BASE DE DATOS
$link = new PDO(
    'mysql:host=localhost;dbname=acba',
    'root',
    '',
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')//Caracteres especiales
);
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);//Deteccion de errores
//FINALIZA CONEXION A BASE DE DATOS

$errores=[];
$nombre="";
$apellido="";
$edad="";
$generos=[
    "h"=>"Hombre",
    "m"=>"Mujer",
    "o"=>"Otro",
];
$email="";
$password="";
$repassword="";
$imagen="";


if (isset($_COOKIE["email"])) {
    header("Location: userprofile.php");exit;
}
if ($_FILES) {
    if ($_FILES["imagen"]["error"] != 0) {
        $errores["imagen"]="Hubo un error al cargar la imagen de perfil <br>";
    }
    else {
        $ext= pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);
        
        if ($ext != "jpg" && $ext != "jpeg" && $ext != "png") {
            $errores["imagen"]="La imagen de perfil debe ser jpg, jpeg o png <br>";
        }
        else {
            move_uploaded_file($_FILES["imagen"]["tmp_name"], "imagen." . $ext);
        }   
    }
}


if ($_POST) {
    if (isset($_POST["nombre"])) {
        if(empty($_POST["nombre"])){
            $errores["nombre"] = "El campo nombre es obligatorio";
        }
        elseif (!ctype_alpha($_POST["nombre"])){
            $errores["nombre"]="El campo nombre debe ser alfabetico";
        }
        elseif (empty($_POST["nombre"]) || strlen($_POST["nombre"]) <= 2){
            $errores["nombre"]="Debe contener mas de dos letras";
        }
        else {
            $nombre=$_POST["nombre"];
        }
    }
    if (isset($_POST["apellido"])) {
        if(empty($_POST["apellido"])){
            $errores["apellido"] = "El campo apellido es obligatorio";
        }
        elseif (!ctype_alpha($_POST["apellido"])){
            $errores["apellido"]="El campo apellido debe ser alfabetico";
        }
        elseif (empty($_POST["apellido"]) || strlen($_POST["apellido"]) <= 2){
            $errores["apellido"]="Debe contener mas de dos letras";
        }
        else {
            $apellido=$_POST["apellido"];
        }
    }
    if (isset($_POST["edad"])) {
        if(empty($_POST["edad"])){
            $errores["edad"] = "El campo edad es obligatorio";
        }
        elseif (!is_numeric($_POST["edad"])){
            $errores["edad"]="El campo edad debe ser numerico";
        }
        elseif (($_POST["edad"]<18) || ($_POST["edad"]>99)) {
            $errores["edad"]="La edad debe estar entre 18 y 99";
        }
        else {
            $edad=$_POST["edad"];
        }
    }
    if (isset($_POST["email"])) {
        if (empty($_POST["email"])) {
            $errores["email"]= " El campo email es obligatorio";
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
        elseif (($_POST["password"]) != ($_POST["repassword"])) {
            $errores["password"]= "Las contraseñas no coinciden";
        }
        else {
            $password=$_POST["password"];
        }
    }
    if (isset($_POST["repassword"])) {
        if (empty($_POST["repassword"])) {
            $errores["repassword"]= "El campo repetir contraseña es obligatorio";
        }
        elseif (strlen($_POST["repassword"])<=7) {
            $errores["repassword"]= "La contraseña debe contener mas de 8 caracteres";
        }
        elseif (($_POST["password"]) != ($_POST["repassword"])) {
            $errores["repassword"]= "Las contraseñas no coinciden";
        }
        else {
            $repassword=$_POST["repassword"];
        }
    }
    if (isset($_POST["terms"])) {
        $_POST["terms"] = "siterms";
    }
    else{
        $_POST["terms"] = "noterms";
    }
    if (isset($_POST["news"])) {
        $_POST["news"] = "sinews";
    }
    else{
        $_POST["news"] = "nonews";
    }
    if (count($errores)==0) {
        $usuarioParaGuardar=[
            "nombre"=>trim($_POST["nombre"]),
            "apellido"=>trim($_POST["apellido"]),
            "edad"=>$_POST["edad"],
            "email"=>$_POST["email"],
            "genero"=>$_POST["genero"],
            "password"=>password_hash($_POST["password"],PASSWORD_DEFAULT),
            "terminos"=>$_POST["terms"],
            "newsletter"=>$_POST["news"]
        ];
        //Instruccion del sql
        $sql= "INSERT INTO users(nombre, apellido, edad, email, genero, contraseña, newsletter) values ('$usuarioParaGuardar[nombre]','$usuarioParaGuardar[apellido]','$usuarioParaGuardar[edad]','$usuarioParaGuardar[email]','$usuarioParaGuardar[genero]','$usuarioParaGuardar[password]','$usuarioParaGuardar[newsletter]')";

        //Preparar el statement
        $stmt = $link->prepare($sql);

        //Ejecutar el statement
        $stmt->execute();
        header("Location: login.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrate</title>
    <script src="https://kit.fontawesome.com/81327c1797.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style-register.css">
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
                </div>
            </header>
            <br>
            <div class="title">
                <h1>
                    COMPLETA TUS DATOS
                </h1>
            </div>
            <section>
                <div class="register">
                    <form action="register.php" method="POST" enctype="multipart/form-data">
                        <br>
                        <div class="names">
                            <div class="first-name">
                                <input id="name" type="text" name="nombre" value="<?=$nombre?>" placeholder="NOMBRE">
                                <small><?= (isset($errores["nombre"])) ? $errores["nombre"] : ""?></small>
                            </div>
                            <div class="surname">
                                <input id="surname" type="text" name="apellido" value="<?=$apellido?>" placeholder="APELLIDO">
                                <small><?= (isset($errores["apellido"])) ? $errores["apellido"] : ""?></small>
                            </div>
                        </div>
                        <br>
                        <div class="age-gender">
                            <div class="age">
                                <input class="edad" type="text" name="edad" id="age" value="<?=$edad?>" placeholder="EDAD">
                                <small><?= (isset($errores["edad"])) ? $errores["edad"] : ""?></small>
                            </div>
                            <div class="gender">
                                <select class="" name="genero">
                                    <?php foreach ($generos as $codigo => $genero) : ?>
                                        <?php if ($_POST["genero"] == $codigo) : ?> 
                                                <option value="<?=$codigo?>" selected> 
                                                    <?=$genero?>
                                                </option>
                                            <?php else : ?>
                                                <option value="<?=$codigo?>">
                                                    <?=$genero?>
                                                </option>
                                        <?php endif; ?>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="email1">
                            <div class="correo">
                                <input id="email" type="text" name="email" value="<?=$email?>" placeholder="EMAIL">
                                <small><?= (isset($errores["email"])) ? $errores["email"] : ""?></small>
                            </div>
                        </div>
                        <br>
                        <div class="pass">
                            <div class="pass1">
                                <input id="password" type="password" name="password" value="<?=$password?>" placeholder="CONTRASEÑA">
                                <small><?= (isset($errores["password"])) ? $errores["password"] : ""?></small>
                            </div>
                            <div class="pass2">
                                <input id="password" type="password" name="repassword" value="<?=$repassword?>" placeholder="REPETIR CONTRASEÑA">
                                <small><?= (isset($errores["repassword"])) ? $errores["repassword"] : ""?></small>
                            </div>
                        </div>
                        <br>
                        <div class="img">
                            <label for="">Foto de perfil</label><br>
                            <input type="file" name="imagen" id="">
                            <small><?= (isset($errores["imagen"])) ? $errores["imagen"] : ""?></small>
                        </div>    
                        <div class="checkboxes-button">
                            <input type="checkbox" name="terms" value="yes-terms">     Acepto los terminos y condiciones <br><br>
                            <div>
                                <input type="checkbox" name="news" value="yes-promo" >     Deseo recibir actualizaciones y ofertas
                            </div>
                            <div class="achicar"> 
                                <input type="image" src=img/right-arrow.svg alt="right-arrow">
                            </div>
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
        