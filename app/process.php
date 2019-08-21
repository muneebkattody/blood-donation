<?php
class formContoller {
    private $origin;
    private $needs;
    private $db_handle;

    function __construct(){
        require 'db.php';
        // GEIING SOURCE NAME
        $this->origin = $_POST['origin'];

        // creating object of DBControler
        $this->db_handle = new DBController;
    }

    function controller(){
        // IF ORIGIN IS CAMPNEEDS
        if ($this->origin == 'register') {

            // GETTING ALL POST VALUES FROM CAMPNEEDS
            $name = $_POST['name'];
            $blood_group = $_POST['blood_group'];
            $phone = $_POST['phone'];
            $place = $_POST['place'];
            $dept = $_POST['dept'];

            // INSERT A RAW IN CAMPNEEDS HISTORY [INSERT ROW IS NOT AN INBUILT FUNCTION ITS DECLARED IN CONFIG.PHP]
            //$this->db_handle->insert_row("doners", $name, $blood_group, $phone, $place);


                $this->db_handle->insert_row("doners", $name, $dept, $blood_group, $phone, $place);
                echo "Data uploaded.";

            // CLOSING DATABASE CONNECTION
            $this->db_handle->close();
        }

        // IF ORIGIN IS DONATION
        if ($this->origin == 'search') {

            // GETTING POST VALUES
            $blood_group = $_POST['$blood_group'];
 
            echo "Data uploaded.";
        }
    }

}

$form = new formContoller();
$form->controller();

?>