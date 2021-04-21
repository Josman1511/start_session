<?php
require_once "../models/ShoppingCar.php";
if(isset($_GET['product_id'])){
$shoppingCar = new ShoppingCar();
$eliminateProduct = $shoppingCar->deleteProductToShoppingCar($_GET['product_id']);
echo 'exito';
exit;
}else{
   $_SESSION['condition'] = 'error';
}
?>