<?php

include("controllers/functions.php");
$generos=[
    "h"=>"Hombre",
    "m"=>"Mujer",
    "o"=>"Otro",
];
$arrayErrores="";
$arrayErrores=validarRegistro($_POST);

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
                            <div class="nombre">
                                <input id="name" type="text" name="nombre" value="<?=persistirDato($arrayErrores, 'nombre');?>" placeholder="NOMBRE">
                                <small><?= (isset($arrayErrores["nombre"])) ? $arrayErrores["nombre"] : ""?></small>
                            </div>
                            <div class="apellido">
                                <input id="surname" type="text" name="apellido" value="<?=persistirDato($arrayErrores, 'apellido');?>" placeholder="APELLIDO">
                                <small><?= (isset($arrayErrores["apellido"])) ? $arrayErrores["apellido"] : ""?></small>
                            </div>
                            
                        </div>
                        <br>
                        <div class="age-gender">
                            <div class="div">
                                <input class="edad" type="text" name="edad" id="age" value="<?=persistirDato($arrayErrores, 'edad');?>" placeholder="EDAD">
                                <small><?= (isset($arrayErrores["edad"])) ? $arrayErrores["edad"] : ""?></small>
                            </div>
                                
                            
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
                                    <?php endif; //Toda esta estrutura mantiene lo que se haya elegido en el select?>
                                <?php endforeach;//este foreach asigna los codigos a cada casa?>
                            </select>
                        </div>
                        <br>
                        <div class="email1">
                            <div class="correo">
                                <input id="email" type="text" name="email" value="<?=persistirDato($arrayErrores, 'email');?>" placeholder="EMAIL">
                                <small><?= (isset($arrayErrores["email"])) ? $arrayErrores["email"] : ""?></small>
                            </div>
                        </div>
                        <br>
                        <div class="pass">
                            <div class="pass1">
                                <input id="password" type="password" name="password" value="<?=persistirDato($arrayErrores, 'password');?>" placeholder="CONTRASEÑA">
                                <small><?= (isset($arrayErrores["password"])) ? $arrayErrores["password"] : ""?></small>
                            </div>
                            <div class="pass1">
                                <input id="password" type="password" name="repassword" value="<?=persistirDato($arrayErrores, 'repassword');?>" placeholder="REPETIR CONTRASEÑA">
                                <small><?= (isset($arrayErrores["repassword"])) ? $arrayErrores["repassword"] : ""?></small>
                            </div>
                            
                        </div>
                        <br>
                        <div class="img">
                            <label for="">Foto de perfil</label><br>
                            <input type="file" name="imagen" id="">
                            <small><?= (isset($arrayErrores["imagen"])) ? $arrayErrores["imagen"] : ""?></small>
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
        