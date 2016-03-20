<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";

$connection = mysqli_connect($servername, $username, $password);
if (!$connection) {
    die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
}

$sql = " CREATE DATABASE nailPolishAdmin ";
if (mysqli_query($connection, $sql)) {
    echo "Datenbank erfolgreich erstellt<br>";
} else {
    echo "Fehler bei der Datenbankerstellung: " . mysqli_error($connection);
}

mysqli_close($connection);