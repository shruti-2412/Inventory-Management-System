<link rel="stylesheet" href="style.css">
<?php
include 'config.php';
include 'sidebar.php';
session_start();
if ($_SESSION['role'] !== 'admin') {
    echo "Access denied!";
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM users");
echo "<h2>Users</h2>";
echo "<table border='1'><tr><th>Username</th><th>Role</th><th>Delete</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['username']}</td>
        <td>{$row['role']}</td>
        <td><a href='delete_user.php?id={$row['id']}'>Delete</a></td>
    </tr>";
}
echo "</table>";
?>
