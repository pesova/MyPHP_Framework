<?php 
/*
*Loads Libraries
all of them
*/

// require_once 'Libraries/Controller.php';
// require_once 'Libraries/Core.php';
// require_once 'Libraries/Database.php';

//Load Config
require_once 'config/config.php';


//Auto loader 
//Loads each library automatically, so instead of requiring a file anytime we add one, we just do the autoload function
spl_autoload_register(function($className){
    require_once 'Libraries/' .$className .'.php';
});