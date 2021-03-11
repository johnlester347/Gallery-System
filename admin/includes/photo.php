<?php 

class Photo extends Db_object {


    protected static $db_table = "photos"; // this will change the name of the database that is included in CRUD query
    // sample gumawa ka ng new table magagamit mo padin sya change mo lang yung value or string (reusable na sya)
    protected static $db_table_fields = array('title', 'description', 'filename', 'type', 'size');
    public $id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;

    public $tmp_path;
    public $upload_directory = "images";
    public $custom_error = array();
    public $upload_errors_array = array (

        UPLOAD_ERR_OK         => "There is no error",
        UPLOAD_ERR_INI_SIZE   => "The uploaded file exceeds the upload_max_file_size directive",
        UPLOAD_ERR_FORM_SIZE    => "The uploaded file exceeds the MAX_FILE_SIZE directive that",
        UPLOAD_ERR_PARTIAL      => "The uploaded file was only partially uploaded.",
        UPLOAD_ERR_NO_FILE      => "No file was uploaded.",
        UPLOAD_ERR_NO_TMP_DIR   => "Missing a temporary folder",
        UPLOAD_ERR_CANT_WRITE   => "Failed to write file to disk.",
        UPLOAD_ERR_EXTENSION   => "A PHP extension stopped the file upload."
    );





}




?>