<?php 

require_once "config.php";

class Database {

    public $connection;

    function __construct() { // automatic na mag rurun yung method open_db_connection basta naka instantiate yung class Database

        $this->open_db_connection();

    }

    public function open_db_connection() {

        // $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); // this is the new update way of defining connection 

        if($this->connection->connect_errno) { // this checking is para lang sa object na new mysqli

            die("CONNECTION FAILED" . $this->connection->connect_errno);
            
        }
        

    }

    public function query($sql) {

        $result = $this->connection->query($sql); // eto yung bagong way ng pag call ng query
        $this->confirm_query($result);
        return $result;

    }

    private function confirm_query($result) { // dimo ito magagamit sa labas ng class

        if(!$result) {
            die("QUERY FAILED" . $this->connection->error); // eto yung bagong pag tawag ng error
        }
        
    }

    public function die_query() { // dimo ito magagamit sa labas ng class

        die("QUERY FAILED" . $this->connection->error); 

    }

    public function escape_string($string) {

        $escaped_string = $this->connection->real_escape_string($string); // this is for cleaning the query para
        return $escaped_string;                                                  // hindi ma sql injection

    }

    public function the_insert_id() {

        return  $this->connection->insert_id;

    }

}

$database = new Database();





?>