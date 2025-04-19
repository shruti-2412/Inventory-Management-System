<link rel="stylesheet" href="style.css">
<?php
include 'config.php';
include 'sidebar.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['category_name'])) {
    $name = $_POST['category_name'];
    $conn->query("INSERT INTO categories (category_name) VALUES ('$name')");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM categories WHERE id=$id");
}

$categories = $conn->query("SELECT * FROM categories");
?>

<link rel="stylesheet" href="style.css">
<h2>Manage Categories</h2>

<div style="display: flex; justify-content: space-evenly;">
  <form method="POST">
    <h3>Add New Category</h3>
    <input type="text" name="category_name" placeholder="Category Name" required>
    <button type="submit">Add Category</button>
  </form>

  <div>
    <h3>All Categories</h3>
    <table>
      <tr><th>#</th><th>Category</th><th>Actions</th></tr>
      <?php
      $i = 1;
      while($row = $categories->fetch_assoc()) {
          echo "<tr><td>{$i}</td><td>{$row['category_name']}</td>
          <td>
              <a href='?delete={$row['id']}' style='color:red;'>🗑</a>
          </td></tr>";
          $i++;
      }
      ?>
    </table>
  </div>
</div>
