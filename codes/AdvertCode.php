<?php
include('controller/AuthenticationController.php');
include_once ('controller/AdvertController.php');
$data = $authenticated->authDetail();


$advert = new AdvertController;

if (isset($_POST['adAdvert_btn']))
 {

    // Sample data (replace with actual data from your form)
    $city_id = validateInput($db->conn, $_POST['city']);
    $user_id = $data['UserID'];
    $category_id = validateInput($db->conn, $_POST['category']);
    $title = validateInput($db->conn, $_POST['title']);
    $description = validateInput($db->conn, $_POST['description']);
    $price = validateInput($db->conn, $_POST['price']);
    $image = basename($_FILES['image']['name']);
    $uploadDir = 'uploads/'; // Change this to your desired upload directory
    $uploadFile = $uploadDir . basename($_FILES['image']['name']);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile))
    {

         // Call the insertAdvert method
    $result = $advert->insertAdvert($city_id, $user_id, $category_id, $title, $description, $price, $image);

    // Check the result
    if ($result) {
        redirect('ثبت آگهی با موفقیت انجام شد', 'hesabkarbari.php');
    } else {
        redirect('ثبت آگهی انجام نشد', 'insertAdvert.php');
    }

    // Close the database connection
    $conn->close();
    }

   
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) 
    {
        $advertIDToDelete = $_POST['delete'];

        // Call the deleteAdvert method
        $result = $advert->deleteAdvert($advertIDToDelete);

        // Check the result
        if ($result) {
            redirect('آگهی با موفقیت حذف شد', 'hesabkarbari.php');
            // header("Location: {$_SERVER['PHP_SELF']}");
            // exit();
        } else {
            redirect('حذف آگهی انجام نشد', 'hesabkarbari.php');

        }
    } 
?>
