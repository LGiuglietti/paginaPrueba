<?php
include "protec.php";
include "conexion.php";
if(isset($_POST["eleccion"])){
    $humano=$_POST["eleccion"];
    $maquina=random_int(1,3);
    }  
    if($humano==$maquina){
        $sql=sprintf("UPDATE scoreboard SET empates=empates+1 WHERE usuario_id='%d'", $_SESSION["usuario_id"]);
        mysqli_query($link,$sql);
        header("location:principal.php?op=EMPATE");
        exit();
    }else{
        if(($humano==1 and $maquina==3) or ($humano==2 and $maquina==1) or ($humano==3 and $maquina==2)){
            $sql=sprintf("UPDATE scoreboard SET victorias=victorias+1 WHERE usuario_id='%d'", $_SESSION["usuario_id"]);
            mysqli_query($link,$sql);
            header("location:principal.php?op=VICTORIA");
            exit();
        }else{
            $sql=sprintf("UPDATE scoreboard SET derrotas=derrotas+1 WHERE usuario_id='%d'", $_SESSION["usuario_id"]);
            mysqli_query($link,$sql);
            header("location:principal.php?op=DERROTA");
            exit();        
        }         
    }
?>