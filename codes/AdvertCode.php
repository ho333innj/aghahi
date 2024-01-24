<?php
include('controller/AuthenticationController.php');

include_once ('controller/AdvertController.php');
$data = $authenticated->authDetail();


$advert = new AdvertController;


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adAdvert_btn'])) {
    // Sample data (replace with actual data from your form)
    $city_id = validateInput($advert->conn, $_POST['city']);
    $category_id = validateInput($advert->conn, $_POST['category']);
    $title = validateInput($advert->conn, $_POST['title']);
    $description = validateInput($advert->conn, $_POST['description']);
    $price = validateInput($advert->conn, $_POST['price']);

    // Check if an image is provided
    if (!empty($_FILES['image']['name'])) {
        $image = basename($_FILES['image']['name']);
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);

        // Move the uploaded file
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            // Insert the new advertisement into the database
            $result = $advert->insertAdvert($city_id, $data['UserID'], $category_id, $title, $description, $price, $image);

            if ($result) {
                redirect('آگهی با موفقیت ثبت شد', 'hesabkarbari.php');
            } else {
                redirect('خطا در ثبت آگهی', 'insertadvert.php');
            }
        } else {
            // Handle the case where the file upload fails
            redirect('آپلود تصویر ناموفق بود', 'insertadvert.php');
        }
    } else {
        // Handle the case where no image is provided
        redirect('تصویری انتخاب نشده است', 'insertadvert.php');
    }
}


if (isset($_POST['editAdvert_btn'])) {
    $advertID = validateInput($db->conn, $_POST['editAdvertID']);

    // Sample data (replace with actual data from your form)
    $city_id = validateInput($db->conn, $_POST['city']);
    $category_id = validateInput($db->conn, $_POST['category']);
    $title = validateInput($db->conn, $_POST['title']);
    $description = validateInput($db->conn, $_POST['description']);
    $price = validateInput($db->conn, $_POST['price']);

    // Check if a new image is provided
    if (!empty($_FILES['image']['name'])) {
        $image = basename($_FILES['image']['name']);
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);

        // Move the uploaded file
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            // Update the advert with the new image
            $result = $advert->updateAdvert($advertID, $city_id, $category_id, $title, $description, $price, $image);

            if ($result) {
                redirect('آگهی ویرایش شد', 'hesabkarbari.php');
            } else {
                redirect('آگهی ویرایش نشد', 'editadvert.php?id=' . $advertID);
            }
        } else {
            // Handle the case where the file upload fails
            redirect('آپلود تصویر ناموفق بود', 'editadvert.php?id=' . $advertID);
        }
    } else {
        // No new image provided, use the existing image path
        $existingAdvert = $advert->getAdvertDetails($advertID);
        $image = $existingAdvert['image'];

        // Update the advert without changing the image
        $result = $advert->updateAdvert($advertID, $city_id, $category_id, $title, $description, $price, $image);

        if ($result) {
            redirect('آگهی ویرایش شد', 'hesabkarbari.php');
        } else {
            redirect('آگهی ویرایش نشد', 'editadvert.php?id=' . $advertID);
        }
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
