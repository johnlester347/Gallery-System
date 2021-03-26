<?php include "includes/admin_header.php"; ?>


<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>


<?php 

    $user = new User();

    if(isset($_POST['create'])){

        if($user) {

            $user->username = $_POST['username'];   
            $user->password = $_POST['password'];   
            $user->first_name = $_POST['first_name'];   
            $user->last_name = $_POST['last_name'];  
            $user->set_file($_FILES['user_image']);
            
            if(empty($user->username) || empty($user->password) || empty($user->last_name) || empty($user->first_name)){
                echo "<script>alert('This field should not be empty');</script>";
            } else {
                if($user->save_user_and_image()){

                    $message = "Photo uploaded successfully";
    
                } else {
                        $message = join("<br>", $user->errors);
                }
                $user->create();
            }

           

           
        }

    } else {
        
        $message = "";

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
                    Add User   
                </h1>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="col-md-6 col-md-offset-3">
                    <?php echo $message; ?>
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
                        <input type="file" name="user_image">
                    </div> 

                    <div class="form-group">
                        <input type="submit" name="create" value="Submit" class="btn btn-primary pull-right">
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