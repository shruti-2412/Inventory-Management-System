<?php
include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
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
            <span><?php echo $_SESSION['username']; ?></span>
        </div>
    </div>

    <div class="table-container">
        <h2>Products</h2>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM items");

        if (mysqli_num_rows($result) > 0) {
            echo "<table>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Category</th>
                <th>Stock</th>
                <th>Buying Price</th>
                <th>Selling Price</th>
                <th>Actions</th>
            </tr>";

            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $profit = $row['selling_price'] - $row['buying_price'];
                $profitClass = $profit > 0 ? 'green' : 'red';

                echo "<tr>
                <td>{$i}</td>
                <td>{$row['title']}</td>
                <td>{$row['category']}</td>
                <td>{$row['stock']}</td>
                <td>₹{$row['buying_price']}</td>
                <td>₹{$row['selling_price']}</td>
                <td class='action-column'>
                    <a href='delete_product.php?id={$row['id']}' class='action-btn delete-btn' onclick='return confirm(\"Are you sure?\");'>
                        <i class='fas fa-trash'></i>
                    </a>
                </td>
            </tr>";
                $i++;
            }
            echo "</table>";
        } else {
            echo "<p>No products found.</p>";
        }
        ?>
    </div>
</div>
</body>
</html>