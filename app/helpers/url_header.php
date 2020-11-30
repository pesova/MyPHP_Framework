<?php
// SImple Page redirect
 function redirect($page){
    header('location: ' . URLROOT . '/' . $page);
}

if (!function_exists('dd')) {
    function dd()
     {
         echo '<pre style="background-color:black; color: lightgreen;">';
         array_map(function($x) {var_dump($x);}, func_get_args());
         die;
      }
    }