<?php include "includes/admin_header.php"; ?>


<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>


<?php 

$users = User::find_all();


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
                    Users
                </h1>

                <a href="add_users.php" class="btn btn-primary">Add User</a>

                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Username</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                        </thead>

                        <tbody>

                        <?php foreach($users as $users) : ?>

                        <tr>
                            <td><?php echo $users->id; ?></td>
                            <td><img class="admin-photo-thumbnail user_image" src="<?php echo $users->image_path_and_placeholder(); ?>" alt=""></td>
                            <td><?php echo $users->username; ?></td>
                            <td><?php echo $users->first_name; ?></td>
                            <td><?php echo $users->last_name; ?></td>
                            <td><a class="delete_link" href="delete_users.php?id=<?php echo $users->id; ?>">Delete</a></td>
                            <td><a class="delete_link" href="edit_users.php?id=<?php echo $users->id; ?>"">Edit</a></td>
                        </tr>

                        <?php endforeach; ?>

                        </tbody>
                        
                    </table>
                
                </div>
            </div>
        </div>
        <!-- /.row -->

        </div>


        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/admin_footer.php"; ?>