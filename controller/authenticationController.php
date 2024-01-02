<?php 
// include('config/app.php'); 

// include('controller/loginController.php'); 
// include('controller/registerController.php'); 


class AuthenticationController 

{
    public function _construct() 
    {
         $db = new DatabaseConnection;
         $this->conn =$db->conn;
         $this->checkIsLoggedIn();
    }

    public function IsLoggedIn()
    {
        if(!isset($_SESSION['authenticated']))
        {
            redirect("Login to Access the page", "login.php"); 
            return false; 
        }
        else
        {
            return true; 
        }
    }

    public function authDetail() 
    {
        $checkAuth= $this->checkIsLoggedIn(); 

        if($checkAuth) 
        {  
            $user_id =$_SESSION['auth_user']['user_id'];
            $getUserData ="SELECT * FROM users WHERE id='$user_id' LIMIT 1";
            $result= $this->conn->query($getUserData); 
            if($result->num_rows > 0)
            { 
                $data = $result->fetch_assoc(); 
                return $data; 
            }
            else
            { 
                redirect("Seomthing Went Wrong", "login.php"); 
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