<link rel="stylesheet" href="style.css">

<?php
include 'config.php';
include 'sidebar.php';
session_start();
if ($_SESSION['role'] !== 'admin') {
    echo "Access denied!";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
    mysqli_query($conn, $sql);
    echo "User added!";
}
?>

<form method="post">
    <h2>Add User</h2>
    Username: <input type="text" name="username"><br>
    Password: <input type="text" name="password"><br>
    Role: 
    <select name="role">
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select><br>
    <button type="submit">Add</button>
</form>
