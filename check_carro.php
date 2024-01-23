<?php

//este PHP nos sirve para que aparezca el numero de items que se van añadiendo al carro. Primero comprueba si hay sesion iniciada, si es asi
session_start();
if(isset($_SESSION['nombrePerfil'])){
    if(isset($_SESSION['carrito'])){
        echo count($_SESSION['carrito']);
    } else {
        echo '';
    }
}


?>