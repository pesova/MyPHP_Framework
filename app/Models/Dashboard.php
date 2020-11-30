<?php
  class Dashboard {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function Dashboard($user_id){
        
        if ($user_id == $_SESSION['user_id']) {
            $this->db->query('SELECT * FROM likes WHERE post_id = :post_id');
            $this->db->bind(':post_id', $post_id);
    
            $row = $this->db->single();
    
            return $row;
        }
        
        
    }

}