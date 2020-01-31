<?php

function validarLogin($array){
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
    $email="";
    $password="";
    $nombres=[];
    $usuariosGuardados=[];
    $usuarioFinal=[];
    $username=[];
    if (isset($_COOKIE["email"])) {
        header("Location: userprofile.php");exit;
    }
    if ($array) {
        if (isset($array["email"])) {
            if (empty($array["email"])) {
                $errores["email"]= "El campo email es obligatorio";
            }
            elseif (!filter_var($array["email"], FILTER_VALIDATE_EMAIL)) {
                $errores["email"]="No es un email valido";
            }
            else {
                $email=$array["email"];
            }
        }
        if (isset($array["password"])) {
            if (empty($array["password"])) {
                $errores["password"]= "El campo contraseña es obligatorio";
            }
            elseif (strlen($array["password"])<=7) {
                $errores["password"]= "La contraseña debe contener mas de 8 caracteres";
            }
        }
        if (count($errores) == 0) {
            //Instruccion del sql
            $sql= "SELECT email, contraseña, nombre FROM users";

            //Preparar el statement
            $stmt=$link->prepare($sql);

            //Ejecutar el statement
            $stmt->execute();

            //Mostrar lo consultado
            $usuarios=$stmt->fetchAll(PDO::FETCH_ASSOC);
            for ($i=0; $i < count($usuarios); $i++) { 
                foreach ($usuarios as $usuario) {
                    if ($usuarios[$i]['email'] == $array['email'] && password_verify($_POST['password'],$usuarios[$i]['contraseña'])) {
                        //aqui si lo logeo 
                        $_SESSION['email'] = $usuarios[$i]['email'];
                        setcookie('nombre',$usuarios[$i]['nombre'],time() + 60*60*24*30);
                        if (isset($_POST['recordarme'])) {
                        // creo la cookie de mantenerme logeado
                        setcookie('email',$usuarios[$i]['email'],time() + 60*60*24*30);
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
    }
    return $errores;
}

function validarRegistro($array){
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
    $email="";
    $password="";
    $repassword="";
    $imagen="";

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
                //echo "<img src='imagen.$ext'>";//Muestra la imagen subida
            }   
        }
    }
    if (isset($_COOKIE["email"])) {
        header("Location: userprofile.php");exit;
    }
    if ($array) {
        if (isset($array["nombre"])) {
            if(empty($array["nombre"])){
                $errores["nombre"] = "El campo nombre es obligatorio";
            }
            elseif (!ctype_alpha($array["nombre"])){
                $errores["nombre"]="El campo nombre debe ser alfabetico";
            }
            elseif (empty($array["nombre"]) || strlen($array["nombre"]) <= 2){
                $errores["nombre"]="Debe contener mas de dos letras";
            }
            else {
                $nombre=$array["nombre"];
            }
        }
        if (isset($array["apellido"])) {
            if(empty($array["apellido"])){
                $errores["apellido"] = "El campo apellido es obligatorio";
            }
            elseif (!ctype_alpha($array["apellido"])){
                $errores["apellido"]="El campo apellido debe ser alfabetico";
            }
            elseif (empty($array["apellido"]) || strlen($array["apellido"]) <= 2){
                $errores["apellido"]="Debe contener mas de dos letras";
            }
            else {
                $apellido=$array["apellido"];
            }
        }
        if (isset($array["edad"])) {
            if(empty($array["edad"])){
                $errores["edad"] = "El campo edad es obligatorio";
            }
            elseif (!is_numeric($array["edad"])){
                $errores["edad"]="El campo edad debe ser numerico";
            }
            elseif (($array["edad"]<18) || ($array["edad"]>99)) {
                $errores["edad"]="La edad debe estar entre 18 y 99";
            }
            else {
                $edad=$array["edad"];
            }
        }
        if (isset($array["email"])) {
            if (empty($array["email"])) {
                $errores["email"]= " El campo email es obligatorio";
            }
            elseif (!filter_var($array["email"], FILTER_VALIDATE_EMAIL)) {
                $errores["email"]="No es un email valido";
            }
            else {
                $email=$array["email"];
            }
        }
        if (isset($array["password"])) {
            if (empty($array["password"])) {
                $errores["password"]= "El campo contraseña es obligatorio";
            }
            elseif (strlen($array["password"])<=7) {
                $errores["password"]= "La contraseña debe contener mas de 8 caracteres";
            }
            elseif (($array["password"]) != ($array["repassword"])) {
                $errores["password"]= "Las contraseñas no coinciden";
            }
            else {
                $password=$array["password"];
            }
        }
        if (isset($array["repassword"])) {
            if (empty($array["repassword"])) {
                $errores["repassword"]= "El campo repetir contraseña es obligatorio";
            }
            elseif (strlen($array["repassword"])<=7) {
                $errores["repassword"]= "La contraseña debe contener mas de 8 caracteres";
            }
            elseif (($array["password"]) != ($array["repassword"])) {
                $errores["repassword"]= "Las contraseñas no coinciden";
            }
            else {
                $repassword=$array["repassword"];
            }
        }
        if (isset($array["terms"])) {
            $array["terms"] = "siterms";
        }
        else{
            $array["terms"] = "noterms";
        }
        if (isset($array["news"])) {
            $array["news"] = "sinews";
        }
        else{
            $array["news"] = "nonews";
        }
        if (count($errores)==0) {
            $usuarioParaGuardar=[
                "nombre"=>trim($array["nombre"]),
                "apellido"=>trim($array["apellido"]),
                "edad"=>$array["edad"],
                "email"=>$array["email"],
                "genero"=>$array["genero"],
                "password"=>password_hash($array["password"],PASSWORD_DEFAULT),
                "terminos"=>$array["terms"],
                "newsletter"=>$array["news"]
            ];
            //Instruccion del sql
            $sql= "INSERT INTO users(nombre, apellido, edad, email, genero, contraseña, newsletter) values ('$usuarioParaGuardar[nombre]','$usuarioParaGuardar[apellido]','$usuarioParaGuardar[edad]','$usuarioParaGuardar[email]','$usuarioParaGuardar[genero]','$usuarioParaGuardar[password]','$usuarioParaGuardar[newsletter]')";

            //Preparar el statement
            $stmt = $link->prepare($sql);

            //Ejecutar el statement
            $stmt->execute();
            header("Location: login.php");
        }
        return $errores;
    }
}

function persistirDato($arrayE, $campo) {
    if(isset($arrayE[$campo]) ) {
        return "";
    } else {
        if(isset($_POST[$campo])) {
            return $_POST[$campo];
        }
    }
}

function redireccion($variableA,$variableB){
    $nombre = "";
    if (!isset($variableA["email"]) && !$variableB['email']) {
        header("Location: login.php");exit;
    }
    $nombre = $variableA["nombre"];
    return $nombre;
}