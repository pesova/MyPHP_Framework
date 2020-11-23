<?php
  class Post {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getLikes($post_id){
        $this->db->query('SELECT * FROM likes WHERE post_id = :post_id');
        $this->db->bind(':post_id', $post_id);
  
        $row = $this->db->single();
  
        return $row;
        
    }

    public function addlike($data){
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
    }


    public function deleteLike($post_id){
      $this->db->query('DELETE FROM likes WHERE post_id = :post_id AND user_id = :user_id');
      // Bind values
      $this->db->bind(':post_id', $post_id);
    //   $this->db->bind(':user_id', $user_id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }