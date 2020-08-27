<?php
/*  App core class
*   creates url and loads core controller
*   Url format - /controller/method/params
*/

class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        //print_r($this->getUrl());
        $url = $this->getUrl();

        //look in controllers for first value

        //rememner we are passing it as if we are in index.php  !important
        

        if(isset($url[0])){

            if(file_exists('../app/Controllers/' . ucwords($url[0]). '.php')) {
                // if exists, set as Controller
    
                //anything passed in the url[0], willl be set as a controller
                $this->currentController = ucwords($url[0]);
                unset($url[0]);
            }
        }


        
        //Require the controller
        require_once '../app/Controllers/'. $this->currentController . '.php';
        

        $this->currentController = new $this->currentController;

        //check for second part of the url

        if(isset($url[1])){
            //check to see if method exist in the controller

            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
            }

            unset($url[1]);
        }

        //get params

        $this->params = $url ? array_values($url) : [];

        //call a callback with array of params

        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL); //sanitizes the url and rejects things not suppose to be URL
            $url = explode('/', $url); //explode splits the string with what is being specified
            return $url;
        }

    }
}

// class echo Extends Core {
//     $echo = echo;
// }
