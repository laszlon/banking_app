<?php
session_start();
include 'db.php';

if (!isset($_SESSION['selected_user_id']) || !isset($_SESSION['selected_product_id'])) {
    die("Felhasználó és termék kiválasztása szükséges.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['selected_user_id'];
    $product_id = $_SESSION['selected_product_id'];
    $amount = $_POST['amount'];
    $action = $_POST['action'];

    if ($action == 'subtract') {
        $amount = -$amount;
    }

    $sql = "INSERT INTO transactions (user_id, product_id, amount) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iid", $user_id, $product_id, $amount);

    if ($stmt->execute()) {
        echo "Tranzakció sikeresen végrehajtva.";
    } else {
        echo "Hiba történt a tranzakció végrehajtásakor: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add or Subtract Amount</title>
</head>
<body>
    <h2>Add or Subtract Amount</h2>
    <form action="transaction.php" method="post">
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" required step="0.01">
        <button type="submit" name="action" value="add">Add</button>
        <button type="submit" name="action" value="subtract">Subtract</button>
    </form>
</body>
</html>
