<?php

class RegisterController
 {
    public $conn;
    public function __construct()
    {
        $db = new DatabaseConnection; 
        $this->conn = $db->conn; 
    } 

    public function registration($username, $email, $phone, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $register_query = "INSERT INTO `users` (`UserName`, `Email`, `Mobile`, `Password`) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($register_query);
        $stmt->bind_param("ssss", $username, $email, $phone, $hashedPassword);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    public function isUserExists($email) 
    {
        $checkUniqueUser = "SELECT email FROM users WHERE email = ? LIMIT 1";
        $stmt = $this->conn->prepare($checkUniqueUser);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            return true; // User exists
        } else {
            return false; // User does not exist
        }
        
        $stmt->close();
    }

    public function confirm_Password($password , $password_c)
    {
        if($password == $password_c )
        // ($password === $password_C)
        { 
            return true;
        }
        else
        {
            return false; 

        }
    }
}

