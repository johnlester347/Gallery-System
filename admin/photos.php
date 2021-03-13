<?php include "includes/admin_header.php"; ?>

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
                    Photos
                </h1>
                <div class="col-md-12">
                
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Id</th>
                        <th>File Name</th>
                        <th>Title</th>
                        <th>Size</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>SAMPLE</td>
                        <td>SAMPLE</td>
                        <td>SAMPLE</td>
                        <td>SAMPLE</td>
                        <td>SAMPLE</td>
                    </tr>
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