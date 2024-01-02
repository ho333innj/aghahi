<?php 
include('config/app.php');


class LoginController 

{
    public function __construct() 
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $db= new DatabaseConnection; 
        $this->conn= $db->conn;
    }

    Public function Logout()
    {
        if ((isset($_SESSION['authenticated']) && ($_SESSION['authenticated'] === true)))
        {
         unset($_SESSION['authenticated']);
         unset($_SESSION['auth_user']);
        //  session_destroy();
         return True;
        }else{
            return false;
        }
    }

    public function Login($email, $Password) 
    {
        $checkLogin = "SELECT * FROM users WHERE Email = '$email' LIMIT 1";
        $result = $this->conn->query($checkLogin); 

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $storedPassword = $data['Password'];

            // Use password_verify to check if entered password matches the hashed password
            if (password_verify($Password, $storedPassword)) {
                $this->userAuthentication($data);
                return true;
            } else {
                return false; // Password does not match
            }
        } else {   
            return false; // User not found
        }
    }

    
    
    private function userAuthentication($data) 
    {
        $_SESSION['authenticated'] = true; 
   
        // ٫٫ $_SESSION['auth_role'] $data['role_as']; 
        $_SESSION['auth_user']=
        [
        'user_id' => $data['id'], 
        'user fname' => $data['fname'], 
        'user_Iname' => $data['name'], 
        'user_email' => $data['email']
        ];

    
    }
   public function isLoggedIn()
   {
    if((isset($_SESSION['authenticated'])) && ($_SESSION['authenticated'] === true))
    {
        return true;
    }
    else
    {
        return false;
    }
   }

}


?>