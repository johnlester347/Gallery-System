<?php 

require "init.php";

$user = new User();
$photo = new Photo();


if(isset($_POST['image_name'])){
	
	
	//echo($_POST['image_name']. $_POST['user_id']);
	$user->ajax_save_user_image($_POST['image_name'], $_POST['user_id']);
	
}



//If we have photo_id by ajax post we will use it to display the sidebar info
if(isset($_POST['photo_id'])){
	
	Photo::display_sidebar_data($_POST['photo_id']);
	
	
}







?>