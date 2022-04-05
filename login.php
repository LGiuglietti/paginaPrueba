<?php
session_start();
if(isset($_POST["rusuario"]) && isset($_POST["rpass"])){
    $usuario=trim(strtolower($_POST["rusuario"]));
    $pass=$_POST["rpass"];
    include "conexion.php";
    $sql=sprintf("INSERT INTO scoreboard(usuario, pass) VALUES ('$usuario','$pass')");
    mysqli_query($link, $sql);
    header("location:index.php?op=CREADO");
    exit();
}
if(isset($_POST["usuario"]) && isset($_POST["pass"])){
    $usuario=trim(strtolower($_POST["usuario"]));
    $pass=$_POST["pass"];
}
$sql=sprintf("SELECT usuario_id, usuario FROM scoreboard WHERE usuario='%s' AND pass='%s'", $usuario, $pass);
$res=mysqli_query($link, $sql);
if(mysqli_num_rows($res)){
    $datos=mysqli_fetch_array($res);
    $_SESSION["usuario_id"]=$datos["usuario_id"];
    $_SESSION["usuario"]=$datos["usuario"];
    header("location:principal.php");
    exit();
}else{
    header("location:index.php?op=INCORRECTO");
    exit();
}
?>
