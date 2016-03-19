<?php
include_once("brand.php");

if (isset($_POST["Auswahl"])) {
    $brand = new Brand($_POST["Auswahl"]);
	echo $brand->delete();
}

$brandsObj = new Brand();
$brands = $brandsObj->loadAll();

?>
<form action="delet_brand.php" method="POST">
    <table border="1">
        <thead>
            <tr>
                <th>Auswahl</th>
                <th>ID</th>
                <th>Hersteller</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($brands as $brand) { ?>
                <tr>
                    <td><input type="radio" name="Auswahl" value="<?php echo $brand->id ?>"></td>
                    <td><?php echo $brand->id ?></td>   
                    <td><?php echo $brand->name ?></td>
                </tr>
            <?php } ?>
        </tbody>            
    </table>
    <button type="submit">Löschen</button>
</form>