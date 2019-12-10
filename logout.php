<?php
    session_start();
    session_destroy();
    setcookie('email', null, time() -1);
    header("Location: login.php");

    /* if(isset($_SESSION["email"])){
        header("Location:login.php")
    } */
?>