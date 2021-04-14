<?php
require_once "../models/Carrito.php";
if(isset($_GET['product_id'])){
$carrito = new Carrito();
$eliminateProduct = $carrito->EliminateProductToCarrito($_GET['product_id']);
echo 'exito';
exit;
}else{
   $_SESSION['condicion'] = 'error';
}
?>