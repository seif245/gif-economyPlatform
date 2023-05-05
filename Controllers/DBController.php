<?php

class DBController
{
    protected $servername;
    protected $username;
    protected $password;
    protected $dbname;
    protected $conn;

    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "database";
    }

    public function connect()
    {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }


    // public function openCon()
    // {
    //     $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

    //     // Check connection
    //     if (!$this->conn) {
    //         die("Connection failed: " . mysqli_connect_error());
    //         return false;
    //     } else {
    //         echo true;
    //     }
    // }

    // public function closeCon()
    // {
    //     if (!$this->conn) {
    //         die("Connection failed: " . mysqli_connect_error());
    //     } else {
    //         #echo "connected" ;
    //     }

    //     mysqli_close($this->conn);
    // }

    public function select($qry)
    {
        $result = $this->conn->query($qry);
        if (!$result) {
            echo "Error: " . mysqli_error($this->conn);
            return false;
        } else {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }
    public function insert($query) {
        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            echo "Error in Query: " . mysqli_error($this->conn);
            return false;
        } else {
            return true;
        }
    }
    public function delete($query) {
    $result = mysqli_query($this->conn, $query);
    if (!$result) {
        echo "Error in Query: " . mysqli_error($this->conn);
        return false;
    } else {
        return true;
    }
}

}