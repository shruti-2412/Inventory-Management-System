<link rel="stylesheet" href="style.css">
<?php
include 'config.php';
include 'sidebar.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Fetch categories from DB
$categories = mysqli_query($conn, "SELECT * FROM categories");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $stock = $_POST['stock'];
    $buy = $_POST['buy'];
    $sell = $_POST['sell'];

    $sql = "INSERT INTO items (title, category, stock, buying_price, selling_price) VALUES ('$title', '$category', '$stock', '$buy', '$sell')";
    mysqli_query($conn, $sql);
    echo "<p style='color:green;'>Product added successfully!</p>";
}
?>

<form method="post" class="form-card">
    <h2>Add Product</h2>
    <label>Product Title:</label>
    <input type="text" name="title" required><br>

    <label>Category:</label>
    <select name="category" required>
        <option value="">-- Select Category --</option>
        <?php while ($row = mysqli_fetch_assoc($categories)) { ?>
            <option value="<?= $row['category_name']; ?>"><?= $row['category_name']; ?></option>
        <?php } ?>
    </select><br>

    <label>In-Stock:</label>
    <input type="number" name="stock" required><br>

    <label>Buying Price:</label>
    <input type="number" name="buy" required><br>

    <label>Selling Price:</label>
    <input type="number" name="sell" required><br>

    <button type="submit">Add</button>
</form>
