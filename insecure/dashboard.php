<?php
include 'config.php';
include 'sidebar.php';
session_start();
// Get number of users
$userQuery = mysqli_query($conn, "SELECT COUNT(*) AS total_users FROM users");
$userCount = mysqli_fetch_assoc($userQuery)['total_users'];

// Get number of categories
$categoryQuery = mysqli_query($conn, "SELECT COUNT(*) AS total_categories FROM categories");
$categoryCount = mysqli_fetch_assoc($categoryQuery)['total_categories'];

// Get number of products
$productQuery = mysqli_query($conn, "SELECT COUNT(*) AS total_products FROM items");
$productCount = mysqli_fetch_assoc($productQuery)['total_products'];

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* * {
            margin: 0;
            padding: 0;
            font-family: 'Ubuntu', sans-serif;
            box-sizing: border-box;
        }

        body {
            display: flex;
            background: #f6f7fb;
        } */

        /* .sidebar {
            width: 220px;
            background: #1d1f27;
            color: #fff;
            padding-top: 20px;
            position: fixed;
            height: 100%;
        }

        .sidebar h2 {
            color: #fff;
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            text-decoration: none;
            color: #ccc;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: #292b34;
            color: #fff;
        }

        .sidebar i {
            margin-right: 10px;
        } */

        .main {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
        }

        .topbar .date {
            font-size: 14px;
            color: #888;
        }

        .topbar .user {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .topbar .user i {
            background: #0066cc;
            padding: 8px;
            border-radius: 50%;
            color: white;
        }

        .cards {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card {
            background: white;
            flex: 1 1 200px;
            display: flex;
            align-items: center;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .card .icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            color: white;
            font-size: 28px;
            margin-right: 20px;
        }

        .card .info h3 {
            margin: 0;
            font-size: 24px;
        }

        .card .info p {
            color: #666;
        }

        .purple {
            background: #af7ac5;
        }

        .orange {
            background: #fc6f4d;
        }

        .blue {
            background: #6f7efa;
        }

        .green {
            background: #8bc34a;
        }

    </style>
</head>

<body>

    <div class="main">
        <div class="topbar">
            <div class="date"><?php echo date("F d, Y, g:i a"); ?></div>
            <div class="user">
                <i class="fas fa-user-circle"></i>
                <span><?php echo $_SESSION['username']; ?></span>
            </div>
        </div>

        <div class="cards">
            <div class="card">
                <div class="icon purple"><i class="fas fa-user"></i></div>
                <div class="info">
                    <h3><?php echo $userCount; ?></h3>
                    <p>Users</p>
                </div>
            </div>
            <div class="card">
                <div class="icon orange"><i class="fas fa-th-large"></i></div>
                <div class="info">
                    <h3><?php echo $categoryCount; ?></h3>
                    <p>Categories</p>
                </div>
            </div>
            <div class="card">
                <div class="icon blue"><i class="fas fa-shopping-cart"></i></div>
                <div class="info">
                    <h3><?php echo $productCount; ?></h3>
                    <p>Products</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>