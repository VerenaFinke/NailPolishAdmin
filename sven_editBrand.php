<?php
// CREATE Brand

// Include files
require_once('brand.php');

if($_POST['sent'] == 'true') {
	// einfügen
	$brand = new Brand();
	$brand->name = $_POST['name'];
	$brand->save();	
}

?>



<!-- Formular erzeugen -->
<form action="" method="POST">
	<input type="hidden" name="id">
	<input type="hidden" name="sent" value="true">

	<input type="text" name="name">

	<button type="submit">Speichern</button>
</form>
