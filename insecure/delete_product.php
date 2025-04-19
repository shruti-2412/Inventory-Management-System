<link rel="stylesheet" href="style.css">
<?php
include 'config.php';
session_start();
if ($_SESSION['role'] !== 'admin') {
    echo "Access denied!";
    exit();
}
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM items WHERE id=$id");
header("Location: product.php");
?>
