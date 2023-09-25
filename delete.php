<?php
require_once "database.php";

$id = $_GET["id"];

$sql = "DELETE FROM products WHERE ProductID=?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: products.php");
exit();
?>