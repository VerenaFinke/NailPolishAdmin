<?php
require_once("brand.php");

// create
$mac = new brand();
$mac->name = "MAC";
echo $mac->save();

unset($mac);
echo "<br>";

// load
$mac = new brand(1);
echo $mac->id . ": " . $mac->name;

unset($mac);
echo "<br>";

// edit
$mac = new brand(1);
echo $mac->id . ": " . $mac->name;

$mac->id = 1;
$mac->name = "Essie";
echo $mac->save();

unset($mac);
echo "<br>";

$mac = new brand(1);
echo $mac->id . ": " . $mac->name;

unset($mac);
echo "<br>";

// delete
$mac = new brand(1);
echo $mac->delete();