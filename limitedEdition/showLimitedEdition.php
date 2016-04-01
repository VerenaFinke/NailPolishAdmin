<?php
require_once("../include/header.php");

$servername = "127.0.0.1";
$username = "root";
$password = "";
$databaseName = "nailPolishAdmin";

$connection = mysqli_connect($servername, $username, $password, $databaseName);
if (!connection) {
    die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
}
mysqli_select_db($connection, "limitedEdition");
$results = mysqli_query($connection, "SELECT * FROM limitedEdition ");
?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>limited Edition</th>
            <th>Hersteller ID</th>
        </tr>
    </thead>
    <tbody>
        <?php while($dsatz = mysqli_fetch_assoc($results)) { ?>
            <tr>
                <td><?php echo $dsatz["id"]; ?></td>
                <td><?php echo $dsatz["name"]; ?></td>
                <td><?php echo $dsatz["brandId"]; ?></td>
                <td><a href="editLimitedEdition.php?id=<?php echo $dsatz['id'] ?>">Bearteiten</a></td>
                <td><a href="deleteLimitedEdition.php?id=<?php echo $dsatz['id'] ?>">Löschen</a></td>
            </tr>
            <?php } ?>
    </tbody>              
</table>
<p><a href="editLimitedEdition.php">Neue limited Edition anlegen</a></p>
<?php require_once("../include/footer.php"); ?>    
    

