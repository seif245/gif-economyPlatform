<?php

require_once "../../Models/user.php";
require_once "../../Controllers/DBController.php";

class AuthController
{
    protected $db;

    public function login(User $user)
    {
        $this->db = new DBController;
        $this->db->connect(); // add this line to establish a connection

        if ($this->db) {
            $query = "select * from user where email='$user->email' and password='$user->password' ";
            $result = $this->db->select($query);
            if(!$result){
                #echo "Error in Query";
                return false;
            }
            else{
                if(count($result)==0){
                    echo "you have enterd worng email and password" ;
                    return false ;
                }
                else{
                    echo "loged in ";
                    // Starting a session and storing user data in it
                    session_start();
                    $_SESSION['$u_id'] = $result[0]['u_id']; // assuming the first row of the result contains the user data
                    $_SESSION['$full_name'] = $result[0]['full_name'];
                    $_SESSION['$email'] = $result[0]['email'];
                    $_SESSION['$pasword'] = $result[0]['password'];
                    $_SESSION['$address'] = $result[0]['address'];
                    $_SESSION['$role_id'] = $result[0]['role_id'];
                    return true ;
                }
            }
            
        } else {
            echo "Error in Database connections";
            return false;
        }
    }

        public function register(User $user)
{
    $this->db = new DBController;
    $this->db->connect(); // add this line to establish a connection

    if ($this->db) {
        $query = "insert into user (full_name, email, password, address) values ('$user->full_name', '$user->email', '$user->password', '$user->address')";
        $result = $this->db->insert($query);
        if(!$result){
            #echo "Error in Query";
            return false;
        }
        else{
            echo "registered successfully";
            return true ;
        }
    } else {
        echo "Error in Database connections";
        return false;
    }
}

}