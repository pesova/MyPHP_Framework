<?php 
/*
* Base Controller
* Loads the  Model and views
*/

class Controller {
    //Loads Model

    public function Model($model){
        //require the model File

        require_once '../app/Models/' . $model . '.php';

        //instantiate the model

        return new $model(); 
    }

    //Load Views
    // Remember the view method loads a view and an optional data
    public function View($View, $data = []){
        //check for view
        if(file_exists('../app/Views/' . $View . '.php')){
            require_once '../app/Views/' . $View . '.php';
        } else{
            die('View does not exist');
        }
    }
}

// echo "here";