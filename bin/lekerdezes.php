<?php
include("db.php");

// Customer lista betöltése
$sql = "SELECT [ID],[firstname],[lastname],[address],[email] FROM customer WHERE Deleted = 0";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lekérdezés</title>
</head>
<body>
    <h2>Ügyfél kiválasztása</h2>
    <form method="post" action="lekerdezes.php">
        <label for="customer">Ügyfél:</label>
        <select name="customer">
            <?php while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) { ?>
                <option value="<?php echo $row['ID']; ?>">
                    <?php echo $row['lastname'] . " " . $row['firstname']; ?>
                </option>
            <?php } ?>
        </select>
        <br><br>
        <input type="submit" value="Kiválaszt">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $customerID = $_POST['customer'];

        $sql = "SELECT * FROM CustomerProductMapping WHERE CustomerID = ?";
        $params = array($customerID);
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        echo "<h2>Termékek</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Termék kód</th><th>Létrehozva</th><th>Törölt?</th><th>Lezárás dátuma</th></tr>";

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['ProductID'] . "</td>";
            echo "<td>" . $row['Created']->format('Y-m-d H:i:s') . "</td>";
            echo "<td>" . ($row['Deleted'] ? $row['Deleted']->format('Y-m-d H:i:s') : '') . "</td>";
            echo "<td>" . ($row['Closed'] ? $row['Closed']->format('Y-m-d H:i:s') : '') . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        sqlsrv_free_stmt($stmt);
    }
    ?>

</body>
</html>

