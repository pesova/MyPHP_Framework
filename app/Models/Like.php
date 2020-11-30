<?php
  class Like {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function ifUserExist($userid, $post_id){
      $this->db->query('SELECT * FROM likes WHERE post_id = :post_id AND user_id = :user_id');
      $this->db->bind(':post_id', $post_id);
      $this->db->bind(':user_id', $userid);

      $row = $this->db->resultSet();
      if (count($row) > 0) {
        //  return "user has liked post";
       
        return true;
      } else{
        // return "user has'nt liked post";
        
        return false;
      }

      // return $row;
    }

    public function getLikes($post_id){
        $this->db->query('SELECT * FROM likes WHERE post_id = :post_id');
         $this->db->bind(':post_id', $post_id);
  
        // $this->db->execute();
        $row = $this->db->resultSet();
        
  
        // echo $row;
        return $row;
        
    }

    public function addlike($data){

      if($this->ifUserExist($_SESSION['user_id'], $data['post_id']) == false){
          $this->db->query('INSERT INTO likes (post_id, user_id) VALUES(:post_id, :user_id)');
          // Bind values
          $this->db->bind(':post_id', $data['post_id']);
          $this->db->bind(':user_id', $data['user_id']);

          // Execute
          if($this->db->execute()){
            return true;
          } else {
            return false;
          }
      }else {
        return "User have already liked this post";
      }
     
    }


    public function deleteLike($data){
      $this->db->query('DELETE FROM likes WHERE post_id = :post_id AND user_id = :user_id');

      // Bind values
      $this->db->bind(':post_id', $data['post_id']);
      $this->db->bind(':user_id', $data['user_id']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }