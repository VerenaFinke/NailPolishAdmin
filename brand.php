
<?php
class Brand {
    private $mysqli;

    public $id;
    public $name;

    public function __construct($id = null) {
        $this->mysqli = new mysqli("", "root", "rooter");
        $this->mysqli->select_db("nailPolishAdmin");
        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
        if ($id !== null) {
            $this->load($id);
        }
    }

    public function save() { 
        if ($this->id > 0) {
            $sql = " UPDATE brand SET name = '". $this->name . "' WHERE id = ".  $this->id ."";
        } else {
            $sql = " INSERT INTO brand (name) values ('" . $this->name . "')";
        }

        $res = $this->mysqli->query($sql);
        if ($res == true) {
            return "Erfolgreich gespeichert";
        } else {
            return $this->mysqli->error;
        }
    }   

    public function delete() {
        $sql = " DELETE FROM brand WHERE id = ". $this->id . "";
        $res = $this->mysqli->query($sql);
        if ($res == true) {
            return "Erfolgreich gelöscht";
        } else {
            return $this->mysqli->error;
        }
    }

    public function load($id) {
        $sql = " SELECT * FROM brand WHERE id = ". $id . "";
        $res = $this->mysqli->query($sql);

        if ($res->num_rows > 0) {
            $dsatz = $res->fetch_assoc();

            $this->id = $dsatz["id"];
            $this->name = $dsatz["name"];
        }     
    }
}  