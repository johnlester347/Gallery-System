<?php 

class Comment extends Db_object {

    protected static $db_table = "comments"; // this will change the name of the database that is included in CRUD query
    // sample gumawa ka ng new table magagamit mo padin sya change mo lang yung value or string (reusable na sya)
    protected static $db_table_fields = array('id', 'photo_id', 'author', 'body');
    public $id;
    public $photo_id;
    public $author;
    public $body;


    public static function create_comment($photo_id, string $author, string $body){

        if(!empty($photo_id) && !empty($author) && !empty($body)){

        $comment = new Comment();

        $comment->photo_id = (int)$photo_id;
        $comment->author = $author;
        $comment->body = $body;

        return $comment;

        } else {

        return false; // if it is empty

        }

    } 

    public static function find_the_comments($photo_id) {

        global $database;

        $sql = "SELECT * FROM " . static::$db_table . " WHERE photo_id = $database->escape_string($photo_id) ORDER BY photo_id ASC";

        $database = self::find_by_query($sql);
        return $database;

    }

















} // end of class

?>