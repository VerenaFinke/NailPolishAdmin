<?php
// CREATE Brand

// Include files
require_once("brand.php");

if(isset($_POST["sent"])) {
	// einfügen
    $brand = new Brand($_POST["id"]);
	$brand->name = $_POST['name'];
	echo $brand->save();   
} else {
    $brand = new Brand($_GET["id"]);
}

?>

<!-- Formular erzeugen -->
<form action="edit_brand.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $brand->id ?>">
    <p><input type="text" name="name" value="<?php echo $brand->name ?>">Hersteller</p>
    <p><button type="submit" name="sent">Speichern</button>
    <input type="reset"></p>
</form>
