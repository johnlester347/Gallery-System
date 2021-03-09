<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dashboard
        </h1>

        <?php 

        // $user = User::find_all_users(); 
        // while($row = mysqli_fetch_array($user)){
        //     $name = $row['first_name'];

        //     echo $name . "<br>";
        // }

        // $found_user = User::find_user_by_id(1); // eto yung pinaka magandang way ng pag tawag na no need mag instantiate ng class just add static

        // $new_user = new User(); // ininstantiate ko kasi gagamitin ko yung properties or variable sa User na naka public pero walang value

        // $new_user->id = $user['id'];  // eto sya bali public $id kasi sya now using instantiate we dont need to use dollar sign
 
        // $user = User::instantiation($found_user); 
        // echo $user->id;

        // $users = User::find_all_users(); 
        // foreach($users as $user) {
        //     echo $user->username . "<br>";
        // }

        $found_user = User::find_user_by_id(2);
        
        // echo $found_user->username;

        //  echo $session->message(123);


        ?>

        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>

       
    </div>
</div>
<!-- /.row -->

</div>