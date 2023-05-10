<?php

require_once '../../Models/posts.php';
require_once "../../Controllers/DBController.php";


class PostController
{
    protected $db;

    public function getinformation()
    {
        $this->db = new DBController;
        $this->db->connect();
        if ($this->db) {
            $query = "select * from post";
            return $this->db->select($query);
        } else {
            echo "Error in database";
            return false;
        }
    }


    public function add(Posts $post)
    {
        $this->db = new DBController;
        $this->db->connect();
        if ($this->db) {
            $query = "insert into post (name_publisher,name_post, description) values('$post->name_publisher','$post->name_post','$post->description')";
             $this->db->insert($query);
             return true;
        } else {
            echo 'Error in database connection';
            return false;
        }
    }


}
