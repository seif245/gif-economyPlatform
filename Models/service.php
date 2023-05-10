<?php
class Service
{
    public $db;
    public $u_name ;
    public $s_id;
    public $s_des;
    public $admin_id;
    public $user_id;
    public $time ;
    public $s_img ;

    public function pushServiceToDatabase(Service $sev) {
      // create a new instance of the DBController class and assign it to the $db property
      $this->db = new DBController();
  
      // connect to the database
      $this->db->connect();
      $query = "INSERT INTO service (u_name, s_des, user_id, s_time, s_img)
                VALUES ('$sev->u_name', '$sev->s_des', '$sev->user_id', NOW(), '$sev->s_img')";
                
      $result = $this->db->insert($query);
  
      if ($result) {
          // display a success message and reload the page
          echo "Post added successfully";
          header("Location: home.php");
          exit();
        } else {
          // display an error message
          echo "Error adding post";
        }
    
        // close the database connection
        $this->db->closeCon();
  }
  public function getAllServices() {
    // create a new instance of the DBController class and assign it to the $db property
    $this->db = new DBController();

    // connect to the database
    $this->db->connect();
    $query = "SELECT * FROM service";
                
    $result = $this->db->select($query);

    // close the database connection
    $this->db->closeCon();

    // return the fetched data
    return $result;
}
}
?>