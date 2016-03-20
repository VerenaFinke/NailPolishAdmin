<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$databaseName = "nailPolishAdmin";

$connection = mysqli_connect($servername, $username, $password, $databaseName);
if (!$connection) {
    die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
}

$sqlbrand = " CREATE TABLE IF NOT EXISTS brand (
    id INTEGER NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
)";

$sqllimitedEdition = " CREATE TABLE IF NOT EXISTS limitedEdition (
    id INTEGER NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    brandId INTEGER(100) NOT NULL,
    PRIMARY KEY (id)
)";

$sqlnailPolish = " CREATE TABLE IF NOT EXISTS nailPolish (
    id INTEGER NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    brandId INTEGER(100) NOT NULL,
    limitedEditionId INTEGER(100),
    PRIMARY KEY (id)
)";

if (mysqli_query($connection, $sqlbrand) === TRUE) {
    echo "Tabelle Brand erfolgreich erstellt<br>";
} else {
    echo "Fehler bei der Tabellenerstellung: " . mysqli_error($connection);
}

if (mysqli_query($connection, $sqllimitedEdition) === TRUE) {
    echo "Tabelle LimitedEdition erfolgreich erstellt<br>";
} else {
    echo "Fehler bei der Tabellenerstellung: " . mysqli_error($connection);
}

if (mysqli_query($connection, $sqlnailPolish) === TRUE) {
    echo "Tabelle NailPolish erfolgreich erstellt<br>";
} else {
    echo "Fehler bei der Tabellenerstellung: " . mysqli_error($connection);
}

mysqli_close($connection);