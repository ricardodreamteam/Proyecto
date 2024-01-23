<?php
session_start();
include('JuegoClass.php');

$titulo = $_SESSION['titulo'];

for($i = 0 ;$i < sizeof($_SESSION['carrito']);$i++){
$juego = unserialize($juegoSerializado);

if($juego->getTitulo()==$titulo){
    unset($_SESSION['carrito'][$i]);
}
}

?>