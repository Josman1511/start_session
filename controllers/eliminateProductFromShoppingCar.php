<?php
require_once "../models/ShoppingCar.php";
if(isset($_GET['product_id'])){
$shoppingCar = new ShoppingCar();
$eliminateProduct = $shoppingCar-> deleteProductToShoppingCar($_GET['product_id']);
echo 'succes';
exit;
}else{
   $_SESSION['condition'] = 'error';
}
?>