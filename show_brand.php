<?php 
require_once("brand.php");

$brandsObj = new Brand();
$brands = $brandsObj-> loadAll();

?>

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($brands as $brand) { ?>
            <tr>
                <td><?php echo $brand->id ?></td>
                <td><?php echo $brand->name ?></td>
                <td><a href='edit_brand.php?id=<?php echo $brand->id ?>'>Bearbeiten</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>