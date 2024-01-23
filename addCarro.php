<?php
include("JuegoClass.php");
error_reporting(E_ERROR | E_PARSE);

session_start();
if(!isset($_SESSION['carrito'])){
    $_SESSION['carrito'] = array();
}


function anadir()
{
    session_start();
    if (isset($_SESSION['nombrePerfil'])) {
        $titulo=$_GET['titulo'];
        $precio=$_GET['precio'];
        $juego = new Juego();
        $juego->setCantidad(1);
        $juego->setTitulo($titulo);
        $juego->setPrecio($precio);
        $serial_object_clase = serialize ($juego);
        $exists = false;
    
        foreach ($_SESSION['carrito'] as $item) {
            $comparar= unserialize($item); 
            if ($comparar->__equals($juego)) {
                $exists = true;

                $juego->sumarCantidad();
                break;
            }
        }
        if (!$exists) {
            array_push($_SESSION['carrito'], $serial_object_clase);

            echo "anadido";
        } else {
            echo "yaAnadido";
        }
    } else {
       echo "sesion";
    }
}
anadir();
?>