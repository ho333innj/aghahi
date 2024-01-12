<?php
include('controller/authenticationController.php');
include('controller/ProfileController.php');
$data = $authenticated->authDetail();
$user_id = $data['UserID'];

if (isset($_POST['editProfile_btn']))
{
    $username = validateInput($db->conn, $_POST['username']);
    // $user_id = $data['UserID'];
    $mobile = validateInput($db->conn, $_POST['mobile']);
    $address = validateInput($db->conn, $_POST['address']);

    $image = basename($_FILES['image']['name']);
    $uploadDir = 'uploads/profile/';
    $uploadFile = $uploadDir . basename($_FILES['image']['name']);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile))
    {
        // Call the updateProfile method
        $result = $editProfile->updateProfile($user_id, $username, $mobile, $address, $image);

        // Check the result
        if ($result) {
            
            redirect('پروفایل آپدیت شد','hesabkarbari.php');
        } else {
            redirect('خطا','editProfile.php');

        }
    }
}
?>
