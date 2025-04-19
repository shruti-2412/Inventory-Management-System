<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
 .sidebar {
    background-color: #1f1f1f;
    color: #ffffff;
    position: fixed;
    width: 250px;
    height: 100%;
    color: white;
    padding: 20px 0px;
    font-family: 'Ubuntu', sans-serif;
    z-index: 1000;
}

.sidebar a {
    display: block;
    color: #cccccc;
    text-decoration: none;
    padding: 12px 20px;
    font-size: 16px;
    transition: background 0.2s;
}

.sidebar a:hover {
    background-color: #333333;
    color: #ffffff;
}

.menu-section .submenu {
    background-color: #2c2c2c;
    padding-left: 20px;
    border-left: 2px dotted #555;
}

.menu-section .submenu a {
    padding: 10px 20px;
    font-size: 14px;
    color: #aaa;
}

.menu-section .submenu a:hover {
    background-color: #3a3a3a;
    color: #ffffff;
}
</style>
</head>
<body>
<div class="sidebar">
    <h2>INVENTORY SYSTEM</h2>
    <a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a>

    <div class="menu-section">
        <a href="#"><i class="fas fa-user"></i> User Management</a>
        <div class="submenu">
            <a href="add_user.php"><i class="fas fa-user-plus"></i> Add User</a>
            <a href="users.php"><i class="fas fa-eye"></i> View Users</a>
        </div>
    </div>

    <a href="categories.php"><i class="fas fa-layer-group"></i> Categories</a>

    <div class="menu-section">
        <a href="#"><i class="fas fa-box-open"></i> Products</a>
        <div class="submenu">
            <a href="add_product.php"><i class="fas fa-plus-circle"></i> Add Product</a>
            <a href="products.php"><i class="fas fa-list"></i> View Products</a>
        </div>
    </div>

    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>
</body>
