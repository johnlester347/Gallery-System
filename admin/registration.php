<?php require_once "includes/admin_header.php" ?>

<?php 


if(isset($_POST['submit'])){

    $user = new User();

$user->username = $_POST['username'];
$user->password = $_POST['password'];
$user->first_name = $_POST['firstname'];
$user->last_name = $_POST['lastname'];

if(!$user->create()){
    echo "This field should not be empty";
} else {
    redirect("index.php");
}


} else {
    echo "";
}



?>

<div class="col-md-4 col-md-offset-3">

<!-- <h4 class="bg-danger"><//?php //echo $the_message; ?></h4> -->
	
<form id="login-id" action="" method="post">
	
<div class="form-group">
	<label for="username">Username</label>
	<input type="text" class="form-control" name="username" value="" >

</div>

<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control" name="password" value="">
	
</div>

<div class="form-group">
	<label for="firstname">First Name</label>
	<input type="text" class="form-control" name="firstname" value="" >

</div>

<div class="form-group">
	<label for="lastname">Last Name</label>
	<input type="text" class="form-control" name="lastname" value="" >

</div>

<div class="form-group">
<input type="submit" name="submit" value="Submit" class="btn btn-primary">

</div>


</form>


</div>