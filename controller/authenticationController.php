<?php 
include('config/app.php'); 

class AuthenticationController 

{
    public $conn;
    public function __construct() 
    {
         $db = new databaseConnection;
         $this->conn = $db->conn;

        //  $this->IsLoggedIn();
    }

    public function IsLoggedIn()
    {
        if(!isset($_SESSION['authenticated']))
        {
            // redirect("Login to Access the page", "login.php"); 
            return false; 
        }
        else
        {
            return true; 
        }
    }

    public function authDetail() 
    {
        $checkAuth= $this->IsLoggedIn(); 

        if($checkAuth) 
        {  
            $user_id = $_SESSION['auth_user']['user_id'];
            $getUserData = "SELECT * FROM users WHERE UserID ='$user_id' LIMIT 1";
            
            $result= $this->conn->query($getUserData); 
            if($result->num_rows > 0)
            { 
                $data = $result->fetch_assoc(); 
                return $data; 
            }
            else
            { 
                redirect("Something Went Wrong", "login.php"); 
            }
        }
        else
        { 
            return false; 
        }  
            
    }
}


$authenticated = new AuthenticationController;

?>