<?php 

class Db_object {

    public static function find_all() { 
        global $database;
        return static::find_by_query("SELECT * FROM " . static::$db_table . "");
    
    }    

    public static function find_by_id($id) {
        global $database;

        $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id = $id "); 

        return !empty($the_result_array) ? array_shift($the_result_array) : false; // this will grab the first item in the array 

    }

    public static function find_by_query($sql) {
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();

        while($row = mysqli_fetch_array($result_set)) { // now all the table is in row variable

            $the_object_array[] = static::instantiation($row);

        }
        return $the_object_array;
    
    }

    public static function instantiation($the_record) { // the $found_user is a record from database using SELECT * FROM users
        
        $calling_class = get_called_class(); // 

        $the_object = new $calling_class; // eto yung parang || new User || pag naka instantiate

        // $the_object->id = $the_record['id']; // eto yung record sa database by passing parameter para mapalitan  

        foreach($the_record as $the_attribute => $value) { // $key = $row and $value = ['username'];

            if($the_object->has_the_attribute($the_attribute)){ // explanation if yung records/attribute ay nag eexist 
                $the_object->$the_attribute = $value; // then i aassign natin yung $the_object->$the_attribute to $value 
                // yung $value ay yung sample ito $row['username'] yung value dyan ay yung username 
                // LAGI MONG TATANDAAN NA YUNG ATTRIBUTE AY YUNG VARIABLE SA PROCEDURAL PHP POTEK MEDYO NAGHAHALO NA KASI SA UTAK MO XD 

            }
        }

        return $the_object;
    }

    private function has_the_attribute($the_attribute) {

        $object_propeties = get_object_vars($this); // yung $this is yung class User || this function its going to return all the properties 
        // of this class User which is public $id;, public $username;, public $password; etc.... 

        return array_key_exists($the_attribute, $object_propeties); // if yung record attribute ay nag eexist sa $the_object_propeties or class User
        // the it will going to return true or false


    }

    public function properties() {

        $properties = array();

        foreach(static::$db_table_fields as $data_fields){

            if(property_exists($this, $data_fields)){
                $properties[$data_fields] = $this->$data_fields; // i aasign nya sa properties lahat ng data ng $data_fields
            }

        }

        return $properties;

        // $properties = get_object_vars($this); 

        // print_r(implode(",",array_keys($properties))); // this will output seperated by comma = id,username,password,first_name,last_name
        // print_r(array_keys($properties)); // this will output lahat ng laman ng properties =
        // Array ( [id] => [username] => [password] => [first_name] => [last_name] => )

    }

    protected function clean_properties() {
        global $database;

        $clean_properties = array();

        foreach ($this->properties() as $key => $value) {
            $clean_properties[$key] = $database->escape_string($value);
        }

        return $clean_properties;


    }

    public function save() {
        global $database;

        return isset($this->id) ? $this->update() : $this->create() ; // this is called abstraction 
        //this will reduce the complexity and increase effeciency
    }

    public function create() {

        global $database;

        $properties = $this->clean_properties();  

    
        $sql = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) . ")"; 
        // this will output seperated by comma = id,username,password,first_name,last_name
        $sql .= " VALUES ('" . implode("','", array_values($properties)) . "')";

        if($database->query($sql)){

            $this->id = $database->the_insert_id();
            return true;

        } else {

            return false;
            
        }
    }

    public function update() {
        
        global $database;

        $properties = $this->clean_properties();

        $properties_fair = array();

        foreach($properties as $key => $value) {

            $properties_fair[] = "{$key}='{$value}'";

        }

        $sql = "UPDATE " . static::$db_table . " SET ";
        $sql .= implode(", ", $properties_fair);
        $sql .= " WHERE id = " . $database->escape_string($this->id) ;

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false; 

    }

    public function delete() {

        global $database;

        $sql = "DELETE FROM " . static::$db_table . " WHERE id = " . $database->escape_string($this->id) . " LIMIT 1";

        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }


}


?>