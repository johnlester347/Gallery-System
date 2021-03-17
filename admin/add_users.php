<?php include "includes/admin_header.php"; ?>


<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>


<?php 

if(empty($_GET['id'])){

// redirect("add_users.php");

} else {
    
    $user_id = $_GET['id'];
    $users = Users::find_by_id($user_id);

    if(isset($_POST['submit'])){

        if($users){

        $users->username = $_POST['username'];   
        $users->password = $_POST['password'];   
        $users->first_name = $_POST['first_name'];   
        $users->last_name = $_POST['last_name'];   
        $users->set_file($_FILES['user_images']);
        $users->save();


        }

    }

}





?>



        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin Gallery</a>
            </div>


            <!-- Top Menu Items -->
            <?php  include "includes/top_nav.php"; ?>



            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php  include "includes/side_nav.php"; ?>


            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Edit users
                </h1>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control">
                    </div> 
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div> 
                    <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input type="text" name="first_name" class="form-control">
                    </div> 
                    <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input type="text" name="last_name" class="form-control">
                    </div> 
                    <div class="form-group">
                        <label for="images">Images</label><br>
                        <input type="file" name="user_images">
                    </div> 

                    <div class="form-group">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </div>

                </div>

            </form>



            </div>
        </div>
        <!-- /.row -->

        </div>


        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/admin_footer.php"; ?>