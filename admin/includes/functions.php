<?php 

//***************Checking if class file exists so we can autoload it in case we forget to include the class **************
function classAutoLoader($class) { // eto ay auto loader na nag checheck kung yung files ay hindi naka include sa init.php

$class = strtolower($class); // ini lolower case nya lahat ng file na nasa includes then ichecheck nya kung naka include ba sa init.php
$the_path = "includes/{$class}.php"; // iniinclude nya automatic yung file name na wala or hindi naka include sa init.php

if(is_file($the_path) && !class_exists($class)){
    require_once($the_path);
}else{
    die("This file name {$class}.php doesn't exist");
}
// if(file_exists($the_path)){

//     require_once($the_path);

// } else {
//     die("This file named {$class}.php was not found man");
// }

}

spl_autoload_register('classAutoLoader');


function redirect($location){ // this method will going to redirect you sa iinput mo na file sa parameter but be sure to include double qoutes

    header("Location: {$location}");
}


?>