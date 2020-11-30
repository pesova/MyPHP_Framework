<?php
  class Likes extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->likesModel = $this->model('Like');
    }

    // public function ifUserExists($userid, $post_id){
    //     $userExists = $this->likesModel->ifUserExist($userid, $post_id);

    //     if ($userExists) {
    //        echo "user exist";
    //       // return true;
    //     } else{
    //       echo "user dosent exist";
    //       // return false;
    //     }

    //     // print_r($userExists);
    // }

    public function getLikesById($post_id){
      // Get posts
      $likes =  count($this->likesModel->getLikes($post_id));

      echo $likes;
      // return $likes;  
      // return $likes;
    
    }


    public function addlikes(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'post_id' => trim($_POST['post_id']),
          'user_id' => $_SESSION['user_id']
        ];

        if($this->likesModel->addlike($data)){

         
            return true;
          } else {
            die('Something went wrong');
          }
      } else{
        die("Only Post Requests");
      }

    }

    public function delete(){

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing post from model

        $data = [
          'post_id' => trim($_POST['post_id']),
          'user_id' => $_SESSION['user_id']
        ];
        $deleteLike = $this->likesModel->deleteLike($data);


        if($this->likesModel->deleteLike($data)){
        
            die("deleted");
            // return true;
        } else {
          die('Something went wrong');
        }
      }else{
        die("only post requests");
      }
    }
    

    
  }