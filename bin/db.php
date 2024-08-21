<?php
$serverName = "DESKTOP-5FH0NHP";
$connectionOptions = array(
    "Database" => "banking",
    "Uid" => "tesztelek",
    "PWD" => "1",
	"CharacterSet" => "UTF-8"
);

// Kapcsolódás létrehozása
$conn = sqlsrv_connect($serverName, $connectionOptions);


if ($conn === false) {
    // Hibakezelés
    die(print_r(sqlsrv_errors(), true));
}
?>
