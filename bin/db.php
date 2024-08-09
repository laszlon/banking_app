<?php
$servername = "DESKTOP-5FH0NHP";
$connectionOptions = array(
    "Database" => "banking",
    "Uid" => "tesztelek",
    "PWD" => "1"
);

// Kapcsolódás létrehozása
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    // Hibakezelés
    die(print_r(sqlsrv_errors(), true));
}

// Példa lekérdezés
$sql = "SELECT * FROM yourTableName";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    // Hibakezelés
    die(print_r(sqlsrv_errors(), true));
}

// Eredmények feldolgozása
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo $row['columnName'] . "<br />";
}

// Kapcsolat lezárása
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
//teszt2
?>
