<?php include "includes/admin_header.php"; ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>


<?php 

if(empty($_GET['id'])) {

    echo "User is not signed in";

} 

$user_id = $_GET['id'];
$users = User::find_by_id($user_id);

if($users) {

    $users->delete();
    $users->unlink_photo();
    redirect("users.php");

} else {

    redirect("users.php");

}

?>