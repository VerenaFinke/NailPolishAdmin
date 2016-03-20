<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$databaseName = "nailPolishAdmin";

$connection = mysqli_connect($servername, $username, $password, $databaseName);
if (!$connection) {
    die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
}
mysqli_select_db($connection, "brand");

if (isset($_GET["id"])) {
    $sql = " DELETE FROM brand WHERE id = '" . $_GET["id"] . "'";
    $resulte = mysqli_query($connection, $sql);
    if ($resulte === TRUE) {
        echo "Datensatz erfolgreich gelöscht";
    }
}
?>
<p><a href="showBrand.php">Zurück zur Übersicht</a></p>