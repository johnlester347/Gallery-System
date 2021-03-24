<?php include "includes/admin_header.php"; ?>


<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>


<?php 

$comments = Comment::find_all();


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
                <a class="navbar-brand" href="index.php">Admin Gallery System</a>
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
                    All  Comments
                </h1>

                <div class="col-md-12">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Body</th>
                            <th>Author</th>
                            <th>Delete</th>
                        </tr>
                        </thead>

                        <tbody>

                        <?php foreach($comments as $comments) : ?>

                        <tr>
                            <td><?php echo $comments->id; ?></td>
                            <td><?php echo $comments->author; ?></td>
                            <td><?php echo $comments->body; ?></td>
                            <td><a class="delete_link" href="delete_comment.php?id=<?php echo $comments->id; ?>">Delete</a></td>
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