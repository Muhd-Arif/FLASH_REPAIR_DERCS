

<?php

// model that holds customer details and methods to edit and find customer details
require_once '../../../libs/profileDB.php';
class CustomerProfileModel
{
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }

  // // Get User by ID
  public function getUserById($id)
  {
    $this->db->query('SELECT * FROM customer WHERE C_ID = :id');
    // Bind value
    $this->db->bind(':id', $id);

    $row = $this->db->single();
    // returns a single row
    return $row;
  }

  // Find user by email
  public function findUserByEmail($email)
  {
    $this->db->query('SELECT * FROM customer WHERE C_Mail = :email');
    // Bind value
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  // Edit User by ID
  public function editUserById($id, $data)
  {
    $this->db->query('UPDATE customer SET C_Name = :name, C_Mail = :email, C_Phone= :phone_number, C_Password= :password WHERE C_ID = :id');
    // Bind value
    $this->db->bind(':id', $id);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':phone_number', $data['phone_number']);
    $this->db->bind(':password', $data['password']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function getAllCustomer()
  {
    $this->db->query('SELECT * FROM customer ORDER BY C_ID DESC');
    // Bind value

    $row = $this->db->resultSet();

    return $row;
  }
  
  // delere cust
  
     function deleteCust(){
        $link = mysqli_connect("localhost", "root", "", "dcrms");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
          $sql = "DELETE FROM  customer where C_ID ='$this->C_ID'";
          if(mysqli_query($link, $sql)){
    echo "Account Deleted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
    }



    
    public function validateCustomerByID($id, $data)
  {
    $this->db->query('UPDATE customer SET C_Status = :status WHERE C_ID = :id');
    // Bind value
    $this->db->bind(':id', $id);
    $this->db->bind(':status', $data['status']);
    // $this->db->bind(':comment', $data['comment']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
