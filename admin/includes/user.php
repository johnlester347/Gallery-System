<?php 

class User extends Db_object {

    protected static $db_table = "users"; // this will change the name of the database that is included in CRUD query
    // sample gumawa ka ng new table magagamit mo padin sya change mo lang yung value or string (reusable na sya)
    protected static $db_table_fields = array('username', 'password', 'last_name', 'first_name', 'user_image');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_image;
    public $upload_directory = "images";
    public $image_placeholder = "http://placehold.it/400x400&text=image";

    public function image_path_and_placeholder() {

        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory.DS.$this->user_image;


    }

    //This is passing $_FILES['uploaded_file'] as an argument


    //Upload file
    public function save_user_and_image() {
        
            if(!empty($this->errors)) { // if this array error is not empty
                return false;
            }

            if(empty($this->user_image) || empty($this->tmp_path)) { // if the property file is empty and property tmp_path is empty
                $this->errors[] = "the file is not available"; // add this inside the property error which is array
                return false;
            }

            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image; // this is the location or directory of the file

            if(file_exists($target_path)) { // if yung $target_path ay true the execute this  
                $this->errors[] = "This file {$this->user_image} already exists"; // Then assign this string inside the array error
                return false;
            }

            if(move_uploaded_file($this->tmp_path, $target_path)){ //PHP function that will that takes user_image tmp path and the destination
                
                unset($this->tmp_path);
                return true;
                
            } else {
                $this->errors[] = "The file directory probably does not have permission";
                return false;
            }

    }

    public static function verify_user($username, $password) {
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM " . self::$db_table . " WHERE username = '{$username}' AND password = '{$password}' LIMIT 1";
        
        $the_result_array = self::find_by_query($sql); 

        return !empty($the_result_array) ? array_shift($the_result_array) : false; // this will get the first result

    }

    public function user_picture_path() {

        return $this->upload_directory.DS.$this->user_image;

    }

    public function unlink_photo() {

            $target_path = SITE_ROOT.DS. 'admin' .DS. $this->user_picture_path();
            return unlink($target_path) ? true : false; 

    }

    //Saving image with ajax from modal
	public function ajax_save_user_image($user_image, $user_id){
		
		global $database;
		
		$user_image = $database->escape_string($user_image);
		$user_id = $database->escape_string($user_id);
		
		$this->user_image = $user_image;
		$this->id = $user_id;
		
		
		$sql = "UPDATE " .self::$db_table ." SET user_image = '{$this->user_image}' ";
        $sql .= "WHERE id = {$this->id} " ;
		$update_image = $database->query($sql);
		
		echo $this->image_path_and_placeholder();
		
		
		
	}





}

?>