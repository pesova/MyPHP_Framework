<?php

class Pages extends Controller {
    public function __construct()
    {
        $this->postModal = $this->model('Post');
    }

    public function index(){

        //because we extended the base controller here, we can now load up any view if it exist
        
        $datal = [
            'Peso' => 'Pesova FrameWork',
            'high' => 'Highest'
        ];
        $this->View('index', $datal);

    }

    public function about($id){
        echo "this is it" . $id;
    }
}