<?php
require_once "../models/Reactions.php";
require_once "../models/Connection.php";
session_start();
$connection = new Connection();
$user = $connection->getUser($_SESSION['user']);
$userId = $user['id'];
$reactions = new Reactions();
if ('like' === $_GET['likeOrDislike']) {
    $like = $reactions->setNewLike($_GET['product_id'], $userId);
    echo $like;
} elseif ('dislike' === $_GET['likeOrDislike']) {
    $dislike = $reactions->setNewDislike($_GET['product_id'], $userId);
}
header("location: ../views/showDetails.php?product_id=" . $_GET['product_id'])
?>