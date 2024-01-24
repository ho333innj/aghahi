<?php
include('controller/authenticationController.php');
include('controller/ProfileController.php');
$data = $authenticated->authDetail();
$user_id = $data['UserID'];

if (isset($_POST['editProfile_btn']))
{
    $username = validateInput($db->conn, $_POST['username']);
    $userEmail = validateInput($db->conn, $_POST['email']); // Use a different variable name

    $mobile = validateInput($db->conn, $_POST['mobile']);
    $address = validateInput($db->conn, $_POST['address']);

    $image = basename($_FILES['image']['name']);
    $uploadDir = 'uploads/profile/';
    $uploadFile = $uploadDir . basename($_FILES['image']['name']);

    // Check if the image is provided
    if (empty($image)) {
        // Call the updateProfile method without image
        $result = $editProfile->updateProfile($user_id, $username, $userEmail, $mobile, $address);
    } else {
        // Move the uploaded image
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            // Call the updateProfile method with image
            $result = $editProfile->updateProfile($user_id, $username, $userEmail, $mobile, $address, $image);
        } else {
            // Handle the case when the image upload fails
            echo "Error uploading image.";
            exit;
        }
    }

    // Check the result
    if ($result) {
        redirect('پروفایل آپدیت شد','hesabkarbari.php');
    } else {
        echo "Error updating profile.";
    }
}
?>
