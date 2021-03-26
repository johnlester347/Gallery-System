<?php include "includes/admin_header.php"; ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>


<?php 

if(empty($_GET['id'])) {

    echo "User is not signed in";

} 

$comment_id = $_GET['id'];
$comments = Comment::find_by_id($comment_id);

if($comments) {

    $comments->delete();
    $session->message("Comment has been deleted");
    redirect("comments.php");

} else {

    redirect("comments.php");

}

?>