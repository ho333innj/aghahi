<?php 
// include('config/app.php');


class LoginController 

{
    public $conn;
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

    public function Login($email, $password)
    {
        $checkLogin = "SELECT * FROM users WHERE Email = ? LIMIT 1";
        $stmt = $this->conn->prepare($checkLogin);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
    
            // Verify the entered password with the hashed password from the database
            if (password_verify($password, $data['Password'])) { // Fix the column name here
                $this->userAuthentication($data);
                return true; // Successful login
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
        'user_id' => $data['UserID'], 
        'user_name' => $data['UserName']
        // 'user_Iname' => $data['name'], 
        // 'user_email' => $data['email']
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