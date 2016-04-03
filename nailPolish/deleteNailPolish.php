<?php
require_once("../include/header.php");

$servername = "127.0.0.1";
$username = "root";
$password = "";
$databaseName = "nailPolishAdmin";

$connection = mysqli_connect($servername, $username, $password, $databaseName);
mysqli_select_db($connection, "nailPolish");

if (isset($_GET["id"])) {
    $sql = " DELETE FROM nailPolish WHERE id = " . $_GET["id"];
    
    mysqli_query($connection, $sql);
    
    $num = mysqli_affected_rows($connection);
    if ($num > 0) {
        echo "Ein Datensatz wurde erfolgreich gelöscht<br>";
    } else {
        echo "Kein Datensatz betroffen<br>";
    }
}
?>
<p><a href="showNailPolish.php">Zurück zur Übersicht</a></p>
<p><a href="editNailPolish.php">Neuer Nagellack anlegen</a></p>
