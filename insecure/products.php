<link rel="stylesheet" href="style.css">
<?php
include 'config.php';
include 'sidebar.php';
session_start();
$result = mysqli_query($conn, "SELECT * FROM items");

echo "<h2>Products</h2>";
echo "<table border='1'>
<tr><th>Title</th><th>Category</th><th>Stock</th><th>Buy</th><th>Sell</th><th>Delete</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['title']}</td>
        <td>{$row['category']}</td>
        <td>{$row['stock']}</td>
        <td>₹{$row['buying_price']}</td>
        <td>₹{$row['selling_price']}</td>
        <td><a href='delete_product.php?id={$row['id']}'>Delete</a></td>
    </tr>";
}
echo "</table>";
?>
