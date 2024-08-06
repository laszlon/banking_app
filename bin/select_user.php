<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user'];

    $_SESSION['selected_user_id'] = $user_id;
    header("Location: products.php");
    exit();
}

$sql = "SELECT id, username FROM users";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select User</title>
</head>
<body>
    <h2>Select User</h2>
    <form action="select_user.php" method="post">
        <label for="user">User:</label>
        <select id="user" name="user">
            <?php while ($row = $result->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['username']; ?></option>
            <?php endwhile; ?>
        </select>
        <button type="submit">Select</button>
    </form>
</body>
</html>
