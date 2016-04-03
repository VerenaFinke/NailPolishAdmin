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

function isDuplicated($connection, $id, $name, $brandId) {
    $sql = " SELECT id FROM nailPolish WHERE name LIKE '" . $_POST["name"] . "'";
    $sql .= " AND brandId LIKE " . $_POST["brandId"] ."";
    if ($id > 0 ) {
        $sql .= " AND id != " . $_POST["id"] . "";
    }
    $result = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0 ) {
        return TRUE;
    } else {
        return FALSE;
    }
}

if (isset($_POST["sent"])) {
    if (isDuplicated($connection, $_POST["id"], $_POST["name"], $_POST["brandId"] )) {
        echo "Diesen Nagellack gibt es schon";
    } else {
        if ($id > 0) {
            $sql = " UPDATE nailPolish SET "
                . " name = '" . $_POST["name"] . "' ,"
                . " brandId = " . $_POST["brandId"] . ","
                . " limitedEditionId = " . $_POST["limitedEditionId"] . ""
                . " WHERE id = " . $_POST["id"] . "";
                
            mysqli_query($connection, $sql);
            $num = mysqli_affected_rows($connection);
            if ($num > 0) {
                echo $num . "Datensatz wurde geändert<br>";
            } else {
                echo "Kein Datensatz wurde geändert!<br>";
            }  
        } else {
            $sql = " INSERT INTO nailPolish (name, brandId, limitedEditionId) values('" . $_POST["name"] . "', '"
                . $_POST["brandId"] . "' , '" . $_POST["limitedEditionId"] . "')";
            mysqli_query($connection, $sql);
            $num = mysqli_affected_rows($connection);
            if ($num > 0) {
                echo $num . "Datensatz wurde erstellt<br>";
            } else {
                echo "Kein neuer Datensatz wurde erstellt<br>";
            }    
        }
    } 
} else {
    $id = "";
    $name = "";
    $brandId = "";
    $limitedEditiondId = "";
    $brands = array();
    $limitedEditions = array();
    
    if (isset($_GET["id"])) {
        $sql = " SELECT * FROM nailPolish WHERE id = " . $_GET["id"] . "";
        $results = mysqli_query($connection, $sql);
        $dsatz = mysqli_fetch_assoc($results);
        $id = $dsatz["id"];
        $name = $dsatz["name"];
        $brandId = $dsatz["brandId"];
        $limitedEditionId = $dsatz["limitedEditionId"];
    } else {
        $sql = "SELECT * FROM brand";
        $results = mysqli_query($connection, $sql);
        while($dsatz = mysqli_fetch_assoc($results)) {
            $brands[] = $dsatz;
        }  
        
        $sql = "SELECT * FROM limitedEdition";
        $results = mysqli_query($connection, $sql);

        while($dsatz = mysqli_fetch_assoc($results)) {
            $limitedEditions[] = $dsatz;
        }  
    }
?>
    <form action ="editNailPolish.php" method="POST">
        <p><input type="hidden" name="id" value="<?php echo $id ?>"></p>
        <p><input type="text" name="name" value="<?php echo $name ?>">Name des Nagellacks</p>
       <p><select name="brandId">
           <?php foreach($brands as $brandId) { ?>
               <option value="<?php echo $brandId['id'] ?>"><?php echo $brandId["name"] ?></option>
           <?php } ?>
        </select></p>
        <p><select name="limitedEditionId">
            <?php foreach($limitedEditions as $limitedEditionId) { ?>
                <option value="<?php echo $limitedEditionId['id'] ?>"><?php echo $limitedEditionId["name"] ?></option>
            <?php } ?>
        </select></p>
        <p><button type="submit" name="sent">Speichern</button><input type="reset"></p>
    </form>               
<?php } ?>
<p><a href="showNailPolish.php">Zurück zur Übersicht</a></p>
<p><a href="editNailPolish.php">Neuen Nagellack anlegen</a></p>
<?php require_once("../include/footer.php") ?>            
           