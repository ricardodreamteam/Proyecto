<?php
$numeroProd;
if (isset($_SESSION['nombre'])){
    $numeroProd = sizeof($_SESSION['carrito']);
}else {
$numeroProd="";
}
echo $numeroProd;
?>