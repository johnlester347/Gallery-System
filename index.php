<?php require_once "includes/header.php"; ?>

<?php 

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

$item_per_page = 8;

$items_total_count = Photo::count_all();

$paginate = new Paginate($page, $item_per_page, $items_total_count); 

$sql = "SELECT * FROM photos LIMIT {$item_per_page} OFFSET {$paginate->offset()} ";

$photos = Photo::find_by_query($sql);


?>
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">


            <div class="thumbnails row">
            
                <?php foreach($photos as $photo): ?>
        
                        <div class="col-xs-6 col-md-3">
                    
                            <a href="photo.php?id=<?php echo $photo->id; ?>" class="thumbnail">
                            
                                <img class="img-responsive home_page_photo" src="admin/<?php echo $photo->picture_path(); ?>" alt="">
                         
                            </a>

                        </div>
            
                <?php endforeach; ?>
    
            </div>
          
                <ul class="pager">

                    <?php 
                    
                    if($paginate->page_total() > 1){

                        if($paginate->has_next()) {

                            echo "<li class='next'><a class='paginate_next' href='index.php?page={$paginate->next()}'>Next</a></li>";

                        }
                    } 

                    for($i=1; $i <= $paginate->page_total(); $i++) {

                        if($i == $paginate->current_page){
                            
                            echo "<li class='active'><a href='index.php?page={$i}'>{$i}</li>";

                        } else {

                            echo "<li class='box'><a href='index.php?page={$i}'>{$i}</li>";
                        }

                    }
                        

                    if($paginate->has_previous()) {

                        echo "<li class='previous'><a  class='paginate_left' href='index.php?page={$paginate->previous()}'>Previous</a></li>";
                    
                    }
                    
                    
                    ?>

                </ul>





 
            </div>



<!-- 
            Blog Sidebar Widgets Column
            <div class="col-md-4">

            
                 <?php //include("includes/sidebar.php"); ?> -->



        </div>
        <!-- /.row -->

        <?php  require_once "includes/footer.php"; ?>
