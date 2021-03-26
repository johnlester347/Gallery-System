<?php include "includes/admin_header.php"; ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

                        <?php 
                            $message = "";

                            if(isset($_FILES['file'])){
                                
                                $photo = new Photo();
                                $photo->title = $_POST['title'];
                                $photo->set_file($_FILES['file']);

                                if($photo->save()){

                                    $message = "Photo uploaded successfully";

                                } else {

                                    $message = join("<br>", $photo->errors);
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
                <a class="navbar-brand" href="../index.php">Admin Gallery System</a>
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
                    Upload
                </h1>
               
            <div class="row">
               <div class="col-md-6">
          
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <?php echo $message; ?>
                        
                        <div class="form-group">
                            <label for="Usernme">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="file" name="file">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value"Submit">
                        </div>
                    </form>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <form action="upload.php" class="dropzone"></form>



                </div>

            </div>

                
                

            </div>
        </div>
        <!-- /.row -->

        </div>


        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/admin_footer.php"; ?>