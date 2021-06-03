
<?php
// model that holds runner details and methods to edit and find runner details
require_once '../../../libs/profileDB.php';
class runnerProfileModel
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // Find user by email
  public function findUserByEmail($email)
  {
    $this->db->query('SELECT * FROM rider WHERE R_Mail = :email');
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

  // // Get User by ID
  public function getUserById($id)
  {
    $this->db->query('SELECT * FROM rider WHERE R_ID = :id');
    // Bind value
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  // // Get All Users
  public function getAllRunners()
  {
    $this->db->query('SELECT * FROM rider ORDER BY R_ID DESC');
    // Bind value

    $row = $this->db->resultSet();

    return $row;
  }

  // Edit User by ID
  public function editUserById($id, $data)
  {
    $this->db->query('UPDATE rider SET R_Name = :name, R_Mail = :email, R_Phone= :phone_number, R_Password = :password, R_Address = :address, R_LicienseNo =:liciense_no WHERE R_ID = :id');

    // Bind value
    $this->db->bind(':id', $id);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':phone_number', $data['phone_number']);
    $this->db->bind(':password', $data['password']);
    $this->db->bind(':address', $data['address']);
    $this->db->bind(':liciense_no', $data['liciense_no']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Reapply User by ID
  public function reapplyUserById($id, $data)
  {
    $this->db->query('UPDATE rider SET R_Name = :name, R_Mail = :email,R_Phone= :phone_number, R_Password = :password, R_Address = :address, R_LicienseNo =:liciense_no WHERE R_ID = :id');

    // Bind value
    $this->db->bind(':id', $id);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':phone_number', $data['phone_number']);
    $this->db->bind(':password', $data['password']);
    $this->db->bind(':address', $data['address']);
    $this->db->bind(':liciense_no', $data['liciense_no']);
    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
 
  public function validateRunnerByID($id, $data)
  {
    $this->db->query('UPDATE rider SET R_AccStatus = :status WHERE R_ID = :id');
    // Bind value
    $this->db->bind(':id', $id);
    $this->db->bind(':status', $data['status']);
    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  } 
  
  
    public function deleteRider(){
        $link = mysqli_connect("localhost", "root", "", "dcrms");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
          $sql = "DELETE FROM  rider  where R_ID ='$this->R_ID'";
          if(mysqli_query($link, $sql)){
    echo "Account Deleted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
       
}
       

 }

