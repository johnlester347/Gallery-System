<?php 

class User {

    protected static $db_table = "users"; // this will change the name of the database that is included in CRUD query
    // sample gumawa ka ng new table magagamit mo padin sya change mo lang yung value or string (reusable nc)
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function find_all_users() { 
    global $database;
    return self::find_this_query("SELECT * FROM users");

    }    

    public static function find_user_by_id($id) {
        global $database;

        $the_result_array = self::find_this_query("SELECT * FROM users WHERE id = $id"); 

        return !empty($the_result_array) ? array_shift($the_result_array) : false; // this is a ternary operator 

        // if(!empty($the_result_array)) {
        //     $name = array_shift(); // grab the first item in the array
        // } else {
        //     return false;
        // }

    }


    public static function find_this_query($sql) {
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();

        while($row = mysqli_fetch_array($result_set)) { // now all the table is in row variable

            $the_object_array[] = self::instantiation($row);

        }
        return $the_object_array;
    
    }

    public static function instantiation($the_record) { // the $found_user is a record from database using SELECT * FROM users
        
        $the_object = new self; // eto yung parang || new User || pag naka instantiate

        // $the_object->id         = $the_record['id']; // eto yung record sa database by passing parameter para mapalitan  
        // $the_object->username   = $the_record['username'];  
        // $the_object->password   = $the_record['password'];  
        // $the_object->first_name = $the_record['first_name'];  
        // $the_object->last_name  = $the_record['last_name'];  

        foreach($the_record as $the_attribute => $value) { 

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

    public static function verify_user($username, $password) {
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' LIMIT 1";
        
        $the_result_array = self::find_this_query($sql); 

        return !empty($the_result_array) ? array_shift($the_result_array) : false; // this will get the first result

    }

    public function properties() {

        return get_object_vars($this); 

        // $properties = get_object_vars($this); 

        // print_r(implode(",",array_keys($properties))); // this will output seperated by comma = id,username,password,first_name,last_name
        // print_r(array_keys($properties)); // this will output lahat ng laman ng properties =
        // Array ( [id] => [username] => [password] => [first_name] => [last_name] => )

    }

    public function create() {

        global $database;

        $properties = $this->properties();  

        $sql = "INSERT INTO " . self::$db_table . "(" . implode(",", array_keys($properties)) . ")"; 
        // this will output seperated by comma = id,username,password,first_name,last_name
        $sql .= " VALUES ('" . implode("','", array_keys($properties)) . "')";

        if($database->query($sql)){

            $this->id = $database->the_insert_id();
            return true;

        } else {

            return false;
            
        }
    }

    public function update() {
        
        global $database;

        $sql = "UPDATE " . self::$db_table . " SET ";
        $sql .= "username = '" . $database->escape_string($this->username)    . "', ";
        $sql .= "password = '" . $database->escape_string($this->password)    . "', ";
        $sql .= "first_name = '" . $database->escape_string($this->first_name) . "', ";
        $sql .= "last_name = '" . $database->escape_string($this->last_name)   . "' ";
        $sql .= " WHERE id = " . $database->escape_string($this->id) ;

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false; 

    }

    public function delete() {

        global $database;

        $sql = "DELETE FROM " . self::$db_table . " WHERE id = " . $database->escape_string($this->id) . " LIMIT 1";

        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }

    public function save() {
        global $database;

        return isset($this->id) ? $this->update() : $this->create() ; // this is called abstraction 
        //this will reduce the complexity and increase effeciency
    }

}


   


?>