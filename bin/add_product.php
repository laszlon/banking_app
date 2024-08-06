<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (name, price) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sd", $product_name, $price);

    if ($stmt->execute()) {
        echo "Termék sikeresen hozzáadva.";
    } else {
        echo "Hiba történt a termék hozzáadásakor: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
</head>
<body>
    <h2>Add Product</h2>
    <form action="add_product.php" method="post">
        <label for="product">Product Name:</label>
        <input type="text" id="product" name="product" required>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required step="0.01">
        <button type="submit">Add Product</button>
    </form>
</body>
</html>
