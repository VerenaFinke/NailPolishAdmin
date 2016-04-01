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

function isDuplicated($connection, $id, $name, $brandId) {
    $sql = "SELECT id FROM limitedEdition WHERE name LIKE '" . $name . "'";
    $sql .= " AND brandId LIKE '" . $brandId . "'";
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
    if ( isDuplicated($connection, $_POST["id"], $_POST["name"], $_POST["brandId"]) ) {
        echo "Diese limited Edition gibt es schon";
    } else {
        if ($_POST["id"] > 0) {
            $sql = " UPDATE limitedEdition SET "
            . " name = '" . $_POST["name"] . "', "
            . " brandId ='" . $_POST["brandId"] . "'"
            . " WHERE id = " . $_POST["id"];
            
            mysqli_query($connection, $sql);
            $num = mysqli_affected_rows($connection);
            if ($num > 0) {
                echo $num . "Datensatz wurde geändert<br>";
            } else {
                echo "Kein Datensatz wurde geändert!<br>";
            }    
        } else {
            $sql = " INSERT INTO limitedEdition(name, brandId) values ('" . $_POST["name"] . "', " . $_POST["brandId"] . ")";
                
            mysqli_query($connection, $sql);
            $num = mysqli_affected_rows($connection);
            if ($num > 0) {
                echo $num . "neuer Datensatz wurde erstellt<br>";
            } else {
                echo "Kein neuer Datensatz ist wurde erstellt!<br>";
            }   
        }
    }                
} else {
    $id = "";
    $name = "";
    $brandId = "";
    
    if (isset($_GET["id"])) {
        $sql = " SELECT * FROM limitedEdition WHERE id = '" . $_GET["id"] . "'";
        $results = mysqli_query($connection, $sql);
        $dsatz = mysqli_fetch_assoc($results);
        $id = $dsatz["id"];
        $name = $dsatz["name"];
        $brandId = $dsatz["brandId"];
    } 
?>
    <form action ="editLimitedEdition.php" method="POST">
        <p><input type="hidden" name="id" value="<?php echo $id ?>"></p>
        <p><input type="text" name="name" value="<?php echo $name ?>">Name der limited Edition</p>
        <P><input type="text" name="brandId" value="<?php echo $brandId ?>">Hersteller ID</p>
        <p><button type="submit" name="sent">Speichern</button>
        <input type="reset"></p>
    </form>
<?php } ?>           
<p><a href="showLimitedEdition.php">Zurück zur Übersicht</a></p>
<p><a href="editLimitedEdition.php">Neue limited Edition anlegen</a></p>
<?php require_once("../include/footer.php"); ?>