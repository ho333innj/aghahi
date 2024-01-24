<?php

class EditProfileController
{
    public $conn;
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function updateProfile($user_id, $username, $userEmail, $mobile, $address, $image = null)
    {
        // Add your update profile logic here
        // Use prepared statements to prevent SQL injection

        // Example:
        if ($image !== null) {
            $updateProfileQuery = "UPDATE `users` SET `UserName` = ?, `Email` = ?, `Mobile` = ?, `address` = ?, `Image` = ? WHERE `UserID` = ?";
            $stmt = $this->conn->prepare($updateProfileQuery);
            $stmt->bind_param("sssssi", $username, $userEmail, $mobile, $address, $image, $user_id);
        } else {
            $updateProfileQuery = "UPDATE `users` SET `UserName` = ?, `Email` = ?, `Mobile` = ?, `address` = ? WHERE `UserID` = ?";
            $stmt = $this->conn->prepare($updateProfileQuery);
            $stmt->bind_param("ssssi", $username, $userEmail, $mobile, $address, $user_id);
        }

        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

}

$editProfile = new EditProfileController();
?>
