<?php
require_once "../models/Reactions.php";
require_once "../models/Connection.php";
session_start();
$connection = new Connection();
$reactions = new Reactions();
if ('like' == $_GET['likeOrDislike']) {
    $reactions->setNewLike($_GET['product_id'], $_SESSION['id']);

} elseif ('dislike' == $_GET['likeOrDislike']) {
    $reaction = $reactions->setNewDislike($_GET['product_id'], $_SESSION['id']);
}
echo $reactions->getCurrentLikes($_GET['product_id']);
?>