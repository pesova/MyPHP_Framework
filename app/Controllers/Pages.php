<?php

class Pages extends Controller {
    public function __construct()
    {
    
    }

    public function index(){

        //because we extended the base controller here, we can now load up any view if it exist
        
        $datal = [
            'Peso' => 'Pesova FrameWork',
            'high' => 'Highest'
        ];
        $this->View('index', $datal);

    }

    public function about(){
        $data2 = [
            'Peso' => 'Pesova FrameWork built with PHP',
            'Version' => '1.0.1',
            'app' => 'Share'
        ];

        $this->View('about', $data2);
    }
}