<?php 

class Photo extends Db_object {


    protected static $db_table = "photos"; // this will change the name of the database that is included in CRUD query
    // sample gumawa ka ng new table magagamit mo padin sya change mo lang yung value or string (reusable na sya)
    protected static $db_table_fields = array('id', 'title', 'caption', 'description', 'filename', 'alternate_text', 'type', 'size');
    public $id;
    public $title;
    public $caption;
    public $description;
    public $filename;
    public $alternate_text;
    public $type;
    public $size;

    public $tmp_path;
    public $upload_directory = "images";
    public $errors = array();
    public $upload_errors_array = array (

        UPLOAD_ERR_OK         => "There is no error",
        UPLOAD_ERR_INI_SIZE   => "The uploaded file exceeds the upload_max_file_size directive in php.ini",
        UPLOAD_ERR_FORM_SIZE    => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML",
        UPLOAD_ERR_PARTIAL      => "The uploaded file was only partially uploaded.",
        UPLOAD_ERR_NO_FILE      => "No file was uploaded.",
        UPLOAD_ERR_NO_TMP_DIR   => "Missing a temporary folder",
        UPLOAD_ERR_CANT_WRITE   => "Failed to write file to disk.",
        UPLOAD_ERR_EXTENSION   => "A PHP extension stopped the file upload."
    );

    public function set_file($file) {

        if(empty($file) || !$file || !is_array($file)) {

            $this->errors[] = "There was no file uploaded here";
            return false;

        } elseif($file['error'] !=0) {

            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;

        } else {

            $this->filename = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type     = $file['type'];
            $this->size     = $file['size'];

        }


    }

    public function picture_path() {

        return $this->upload_directory.DS.$this->filename;



    }

    public function save() {

        if($this->id){

            $this->update();

        } else {

            if(!empty($this->errors)) { // if this array error is not empty
                return false;
            }

            if(empty($this->filename) || empty($this->tmp_path)) { // if the property file is empty and property tmp_path is empty
                $this->errors[] = "the file was not available"; // add this inside the property error which is array
                return false;
            }

            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename; // this is the location or directory of the file

            if(file_exists($target_path)) { // if yung $target_path ay true the execute this  
                $this->errors[] = "This file {$this->filename} already exists"; // Then assign this string to inside the array error
                return false;
            }

            if(move_uploaded_file($this->tmp_path, $target_path)){ // this will going to move the temporary file to permanent location
                if($this->create()){ // 
                    unset($this->tmp_path);
                    return true;
                }
            } else {
                $this->errors[] = "The file directory probably does not have permission";
                return false;
            }

            $this->create(); 

        }



    }

    public function delete_photo() {


        if($this->delete()) {

            $target_path = SITE_ROOT.DS. 'admin' .DS. $this->picture_path();
            return unlink($target_path) ? true : false;

        } else {

            return false;
        }

    }

}




?>