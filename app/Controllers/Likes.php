<?php
  class Posts extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->likesModel = $this->model('Like');
    }

    public function getLikesById($post_id){
      // Get posts
      $likes = $this->likesModel->getPosts($post_id);

      
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
      }

    }

    public function delete($post_id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing post from model
        $deleteLike = $this->likesModel->deleteLike($post_id);


        if($this->postModel->deletePost($post_id)){
        
            return true;
        } else {
          die('Something went wrong');
        }
      }
    }

    
  }