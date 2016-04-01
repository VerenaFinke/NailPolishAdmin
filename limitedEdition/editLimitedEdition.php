<?php
require_once("../include/header.php");

$servername = "127.0.0.1";
$username = "root";
$passwort = "";
$databaseName = "nailPolishAdmin";

$connection = mysqli_connect($servername, $username, $password, $databaseName);
if (!$connection) {
    die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
}
mysqli_select_db($connection, "limitedEdition");

if(isset($_POST["sent"])) {
    if ($_POST["id"] > 0) {
        $sql = " UPDATE limitedEdition SET"
         . "name = '" . $_POST["name"] . "', "
         . "bandeID ='" . $_POST["brandID"] . "'"
         . " WHERE id = " . $_POST["id"];
         
         mysqli_query($connection, $sql);
         $num = mysqli_affected_rows($connection);
         if ($num > 0) {
             echo $num . "Datensatz wurde geändert<br>";
         } else {
             echo "Kein Datensatz ist betroffen<br>";
         }
    } else {
        $sql = " INSERT INTO limitedEdition(name, brandId) values ('" . $_POST["name"] . "', " . $_POST['brandId'] . ")";
        
        mysqli_query($connection, $sql);
        $num = mysqli_affected_rows($connection);
        if ($num > 0) {
            echo $num . "neuer Datensatz wurde erstellt<br>";
        } else {
            echo "Kein Datensatz ist betroffen<br>";
        }         
    }  
}
?>

<form action ="editLimitedEdition.php" methode="POST">
    <p><input type="hidden" name="id"></p>
    <p><input type="text" name="name">Name der limited Edition</p>
    <P><input type="text" name="brandID">Hersteller ID</p>
    <p><button type="submit" name="sent">Speichern</button>
    <input type="reset"></p>
</form>     

<?php require_once("../include/footer.php"); ?>