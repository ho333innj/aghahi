<?php
include 'controller/authenticationController.php';

$data = (isset($_SESSION['authenticated'])) ? $authenticated->authDetail() : "";

// // Check if session is not started, then start it
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include the AdvertController
include 'controller/advertController.php';

// Get all adverts
$adverts = $advert->alladvertShow();
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سایت آگهی و فروش nj</title>
    <link rel="stylesheet" href="./assets/style/style.css">
    <link rel="stylesheet" href="./assets/style/new.css">
</head>

<body>
    <?php include __DIR__ . '/views/templates/header.php'; ?>

    <div class="container">
        <div class="main_detail_container">
            <?php if (isset($_GET['id'])) {
                $advertID = $_GET['id'];
                $advertDetails = $advert->getAdvertDetails($advertID);

                if ($advertDetails !== false) {
                    $ownerDetails = $advert->getUserDetails($advertDetails['User_ID']);
                    ?>
                    <div class="right_detail">
                        <div class="advert_img_">
                            <img src="./uploads/<?php echo htmlspecialchars($advertDetails['image']); ?>">
                        </div>
                        <div class="advert_btns">
                                <div>
                                    <a href="">گزارش آگهی</a>
                                    <img src="./assets/img/danger.png">
                                </div>
                                <div>
                                    <a href="">اشتراک آگهی</a>
                                    <img src="./assets/img/share.png">
                                </div>
                                <div>
                                    <a href="">ذخیره آگهی</a>
                                    <img src="./assets/img/save-instagram.png">
                                </div>                        
                        </div>
                        <div class="advert_description">
                            <p><?php echo htmlspecialchars($advertDetails['Title']); ?></p>
                            <p>قیمت : <?php echo htmlspecialchars($advertDetails['Price']); ?></p>
                            <p><?php echo htmlspecialchars($advertDetails['Description']); ?></p>
                        </div>
                    </div>

                    <?php if ($ownerDetails !== false) { ?>
                        <div class="left_detail">
                            <div class="call_title">
                                <p>اطلاعات تماس</p>
                                <hr>
                            </div>
                            <div class="advert_owner">
                                <img  src="<?php echo isset($ownerDetails['Image']) ? './uploads/profile/' . htmlspecialchars($ownerDetails['Image']) : './assets/img/user.png'; ?>">
                                <p><?php echo htmlspecialchars($ownerDetails['UserName']); ?></p>
                            </div>
                            <div class="advert_owner_detail">
                                <div>
                                    <img src="./assets/img/location.png">
                                    <p> موقعیت مکانی :</p><br>
                                    <p> زنجان</p>
                                </div>
                                <div>
                                    <img src="./assets/img/icons8-call-50.png">
                                    <p> شماره تماس:</p><br>
                                    <p> 09122411375</p>
                                </div>
                                <div>
                                    <img src="./assets/img/email.png">
                                    <p>ایمیل : </p><br>
                                    <p> <?php echo htmlspecialchars($ownerDetails['Email']); ?></p>
                                </div>
                                
                            </div>
                        </div>
                    <?php } else {
                        echo 'Owner not found!';
                    }
                } else {
                    echo 'Advert not found!';
                }
            } else {
                echo 'Invalid request!';
            } ?>
        </div>
    </div>

    <?php include __DIR__ . '/views/templates/footer.php'; ?>
    
</body>

</html>
