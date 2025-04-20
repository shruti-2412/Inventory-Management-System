<?php
include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
// Using prepared statement to prevent SQL injection
$stmt = $conn->prepare("SELECT id FROM users WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$user_query = $stmt->get_result();
$user_data = $user_query->fetch_assoc();
$added_by = $user_data['id'];
$stmt->close();

// Fetch categories from DB
$categories = mysqli_query($conn, "SELECT * FROM categories");

$success_message = '';
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $stock = (int)$_POST['stock'];
    $buy = (float)$_POST['buy'];
    $sell = (float)$_POST['sell'];

    // Using prepared statement for insert
    $stmt = $conn->prepare("INSERT INTO items (title, category, stock, buying_price, selling_price, added_by) 
            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiddi", $title, $category, $stock, $buy, $sell, $added_by);
    
    if ($stmt->execute()) {
        $success_message = "Product added successfully!";
    } else {
        $error_message = "Error: " . $stmt->error;
    }
    $stmt->close();
}

include 'sidebar.php'; 
?>

<div class="main-content">
    <div class="topbar">
        <?php
        date_default_timezone_set('Asia/Kolkata');
        ?>
        <div class="date"><?php echo date("F d, Y, g:i a"); ?></div>
        <div class="user">
            <i class="fas fa-user-circle"></i>
            <span><?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></span>
        </div>
    </div>

    <?php if ($success_message): ?>
        <div class="success-message">
            <?php echo htmlspecialchars($success_message, ENT_QUOTES, 'UTF-8'); ?>
        </div>
    <?php endif; ?>

    <?php if ($error_message): ?>
        <div class="error-message">
            <?php echo htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8'); ?>
        </div>
    <?php endif; ?>

    <form method="post" class="form-card">
        <h2><i class="fas fa-plus-circle"></i> Add New Product</h2>

        <div class="form-group">
            <label for="title">Product Title:</label>
            <input type="text" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="">-- Select Category --</option>
                <?php while ($row = mysqli_fetch_assoc($categories)) { ?>
                    <option value="<?= htmlspecialchars($row['category_name'], ENT_QUOTES, 'UTF-8'); ?>">
                        <?= htmlspecialchars($row['category_name'], ENT_QUOTES, 'UTF-8'); ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="stock">In-Stock:</label>
            <input type="number" id="stock" name="stock" required>
        </div>

        <div class="form-group">
            <label for="buy">Buying Price (₹):</label>
            <input type="number" id="buy" name="buy" required>
        </div>

        <div class="form-group">
            <label for="sell">Selling Price (₹):</label>
            <input type="number" id="sell" name="sell" required>
        </div>

        <button type="submit"><i class="fas fa-save"></i> Add Product</button>
    </form>

</div> 
</body>
</html>