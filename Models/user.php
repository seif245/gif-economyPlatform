<?php
class User
{
    public $db ;
    public $u_id;
    public $full_name;
    public $email;
    public $password;
    public $address;
    public $role_id ;

    
// We need more information about the function that needs to be implemented for the User class. 
// Please provide more details about the function that needs to be implemented.
// We can use the following code to implement the updateUser function to update data in the database:

public function updateUser(User $user)
{
    $this->db = new DBController;
    $this->db->connect();
    $query = "UPDATE user SET full_name = '$user->full_name', email = '$user->email', password = '$user->password', address = '$user->address' WHERE u_id = '$user->u_id'";
    $result = $this->db->insert($query);
    return $result;
}


public function deleteUser($id)
{
    $this->db = new DBController;
    $this->db->connect();
    $query = "DELETE FROM user WHERE u_id = '$id'";
    $result = $this->db->delete($query);
    return $result;
}




}