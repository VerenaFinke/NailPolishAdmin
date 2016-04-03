<?php
require_once("../include/header.php");

$servername = "127.0.0.1";
$username = "root";
$password = "";
$databaseName = "nailPolishAdmin";

$connection = mysqli_connect($servername, $username, $password, $databaseName);
if (!$connection) {
    die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
}

mysqli_select_db($connection, "nailPolish");
$results = mysqli_query($connection, " SELECT * FROM nailPolish ");

?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Hersteller ID</th>
            <th>limited Edition ID</th>
        </tr>
    </thead>
    <tbody>
        <?php while($dsatz = mysqli_fetch_assoc($results)) { ?>
        <tr>
            <td><?php echo $dsatz["id"] ?></td>
            <td><?php echo $dsatz["name"] ?></td>
            <td><?php echo $dastz["brandId"] ?></td>
            <td><?php echo $dsatz["limitedEditionId"] ?></td>
            <td><a href="editNailPolish.php">Bearbeiten</a></td>
            <td><a href="deleteNailPolish.php">Löschen</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<p><a href="editNailPolish.php">Neuen Nagellack anlegen</a></p>
<?php require_once("../include/footer.php"); ?>