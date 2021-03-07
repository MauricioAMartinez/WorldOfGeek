<?php
session_start();

$cantidad=$_GET['cantidad'];
$idProducto=$_GET['idProducto'];

if (isset($_SESSION['cart'])==false){

    $_SESSION['cart']=array();
}
$carritoActual=$_SESSION['cart'];
$productos=array('idProducto'=>$idProducto,'cantidad'=>$cantidad);
$carritoActual[]=$productos;
$_SESSION['cart']=$carritoActual;
header('Location:../cart.php?id='.urlencode($idProducto).'&cantidad='.urlencode($cantidad));



?>