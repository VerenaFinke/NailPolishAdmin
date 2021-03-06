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
mysqli_select_db($connection, "brand");

function isDuplicated($connection, $id, $name) {
    $sql = "SELECT id FROM brand WHERE name LIKE '" . $name . "'";
    if ($id > 0) {
        $sql .= " AND id != '" . $id . "'";
    }
    $result = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        return TRUE;
    } else {
        return FALSE;
    }
}

if (isset($_POST["sent"])) { 
    if ( isDuplicated($connection, $_POST["id"], $_POST["name"]) ) {
        echo "Diesen Hersteller gibt es schon";   
    } else {
        if ($_POST["id"] > 0) {
            $sql = " UPDATE brand SET" . " name = '" . $_POST["name"] . "'" .  "WHERE id = " . $_POST["id"] . "";
        } else {
            $sql = " INSERT INTO brand (name) value ('" . $_POST["name"] . "')";
        }
        mysqli_query($connection, $sql);
        $num = mysqli_affected_rows($connection);
        if ($num > 0) {
            echo $num . "Datensatz betroffen<br>";
        } else {
            echo "Kein Datensatz betroffen<br>";
        }
    }
} else {
    $id = "";
    $name = "";
    
    if (isset($_GET["id"])) {
        $sql = " SELECT * FROM brand WHERE id = '" . $_GET["id"] . "'";
        $results = mysqli_query($connection , $sql);
        $dsatz = mysqli_fetch_assoc($results);
        $id = $dsatz["id"];
        $name = $dsatz["name"]; 
    }
?>
    <form action="editBrand.php" method="POST">    
            <p><input type="hidden" name="id" value="<?php echo $id ?>"></p>
            <p><input type="text" name="name" value="<?php echo $name ?>">Hersteller</p>
        <p><button type="submit" name="sent">Speichern</button>
        <input type="reset"></p>
    </form>
<?php } ?>
<p><a href="showBrand.php">Zurück zur Übersicht</a> <a href="editBrand.php">Neuen Hersteller anlegen</a></p>
<?php require_once("../include/footer.php"); ?>