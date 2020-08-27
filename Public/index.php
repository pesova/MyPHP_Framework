<?php

require_once '../app/boostrap.php';

//class fes
class User {
    public $name;
    public $age;

    //this function runs everytime this class in intantiated/called
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    //method(function)

    public function matter(){
        return $this->name;
    }

}

// $user1 = new User("ppppppee", 38);
//  echo "<br>";
// echo $user1->name . "  is " . $user1->age . " years old";

// echo "<br>";

// echo $user1->name;

// echo "<br>";

// $user2 = new User("kkk", 29);
// echo $user2->name . "  is " . $user1->age . " years old";

// echo "<br>";

// echo $user2->matter();

$user1 = new Core;




?>