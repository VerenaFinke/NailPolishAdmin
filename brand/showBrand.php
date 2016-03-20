<?php
require_once("include/header.php");

$servername = "127.0.0.1";
$username = "root";
$password = "";
$databaseName = "nailPolishAdmin";

$connection = mysqli_connect($servername, $username, $password, $databaseName);
if (!$connection) {
    die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
}
mysqli_select_db($connection, "brand");
$results = mysqli_query($connection, " SELECT * FROM brand ");
?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Herteller</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php while($dsatz = mysqli_fetch_assoc($results)) { ?>
        <tr>
            <td><?php echo $dsatz["id"]; ?></td>
            <td><?php echo $dsatz["name"]; ?></td>
            <td><a href="editBrand.php?id=<?php echo $dsatz['id'] ?>">Bearbeiten</td>
            <td><a href="deleteBrand.php?id=<?php echo $dsatz['id'] ?>">Löschen</td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php include_once("include/footer.php"); ?>