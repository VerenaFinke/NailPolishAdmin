<?php

class Brand
{
	private $mysqli;
	private $id;
	private $name;

	public function __construct($id = null) {
		// Mysqli initialisieren
		// $this->mysqli = new mysqli(...);
		// Daten laden falls ID gesetzt (also != null)
		// $this->load();
	}

	// public function save()
	// public function delete()
	// private function load()
	//
	//
	// NiceToHave:
	// static public function getBrands()
	// {
	//	Gibt ein Array mit allen gespeicherten Herstellern aus der Datenbank zurück. Vorsicht! Das mysqli Objekt ist nicht statisch und kann hier nicht benutzt werden. Also neu anlegen.
	//	Die einzelnen Hersteller sollen als Objekte in dem Array sein.
	// }
}

?>
