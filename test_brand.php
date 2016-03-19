<?php
require_once("brand.php");

// create
$mac = new Brand();
$mac->name = "MAC";
echo $mac->save();

unset($mac);
echo "<br>";

// load
$mac = new Brand(1);
echo $mac->id . ": " . $mac->name;

unset($mac);
echo "<br>";

// edit
$mac = new Brand(2);
echo $mac->id . ": " . $mac->name;

$mac->name = "Essie";
echo $mac->save();

unset($mac);
echo "<br>";

$mac = new Brand(1);
echo $mac->id . ": " . $mac->name;

unset($mac);
echo "<br>";

/*// delete
$mac = new Brand(3);
echo $mac->delete();*/

