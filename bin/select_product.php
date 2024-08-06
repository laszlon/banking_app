<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product'];

    $_SESSION['selected_product_id'] = $product_id;
    header("Location: transaction.php");
    exit();
}

$sql = "SELECT id, name FROM products";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Product</title>
</head>
<body>
    <h2>Select Product</h2>
    <form action="select_product.php" method="post">
        <label for="product">Product:</label>
        <select id="product" name="product">
            <?php while ($row = $result->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
            <?php endwhile; ?>
        </select>
        <button type="submit">Select</button>
    </form>
</body>
</html>
