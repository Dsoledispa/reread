<?php
// 1. Conexion con la base de datos
include '../services/connection.php';

$email=$_REQUEST['email'];
$psswd=$_REQUEST['password'];

$email=mysqli_real_escape_string($conn,$email);

$user = mysqli_query($conn,"SELECT * FROM users WHERE Email='$email' and Pass='$psswd'");

if (mysqli_num_rows($user) == 1){
    // coincidencia de credenciales
    session_start();
    $_SESSION ['email']=$email;
    header("location: ../view/zona.admin.php");
}else{
    //usuario o contraseña erroneos
    echo "No funciona";
    header("location: ../view/login.html");
}

mysqli_free_result($user);