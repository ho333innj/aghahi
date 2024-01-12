<div class="adverts_cards">
                    <div class="ad_cr_title">
                        <h1>آگهی های من</h1>
                    </div>
                    <div class="cards Sahel">
                <?php   if ($adverts !== false) {foreach ($adverts as $advert) { ?>
                <a href="#">
                    <div class="card">
                        <img src="./uploads/<?PHP echo $advert['image'];?>" alt="Denim Jeans" style="width:100%">
                        <h3><?PHP echo $advert['Title'];?></h3>
                        <p class="card-price" id="amount"><?PHP echo $advert['Price'];?>; <span class="toman">تومان</span></p>
                        <p class="card-location"><?PHP echo $advert['City_ID'];?></p>
                        <p class="card-time">لحظاتی پیش</p>
                        <!-- <p class="card-button"><button>جزییات بیشتر</button></p> -->
                    </div>
                </a>
                    <?php  } } ?>
                    <div class="no_ad_image">
                     <img src="./assets/img/—Pngtree—no result search icon_6511543.png" >
                        <a herf="#">ثبت آگهی جدید</a>
                    </div>
            </div>

            -----------------------------$_COOKIE
            
    public function UpdateProfile($username, $mobile, $address , $image ,$user_id) 
    {
        $UpdateProfileQuery = "update `Users` set `UserName`= '$username' ,`Mobile`= '$mobile' ,`address`= '$address' , `Image`= '$image'   where `UserID` = '$user_id'";
        $stmt = $this->conn->prepare( $UpdateProfileQuery);
        $stmt->bind_param("sssss", $username, $email, $phone, $address , $image,$user_id );
        $result = $stmt->execute();
        $stmt->close();
    
        return $result;
    
    }

    --------------------------------------------------$_COOKIE
    <?php
include('controller/authenticationController.php');
$data = (isset($_SESSION['authenticated'])) ? $authenticated->authDetail() : "";

// include 'config/app.php';
include 'controller/advertController.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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
  <?php  if (isset($_GET['id'])) {
    $advertID = $_GET['id'];
    $advertDetails = $advert->getAdvertDetails($advertID);
    
    if ($advertDetails !== false) {
        $ownerDetails = $advert->getUserDetails($advertDetails['User_ID']);
        ?>
     <div class="right_detail">
            <div class="advert_img_">
                <img src="./uploads/<?php echo $advertDetails['image']; ?>">
            </div>
            <div class="advert_btns">
                <div>
                    <p>گزارش آگهی</p>
                    <img src="./assets/img/report.png">
                </div>
                <div>
                    <p>اشتراک گذاری</p>
                    <img src="./assets/img/share.png">
                </div>
                <div>
                    <p>ذخیره</p>
                    <img src="./assets/img/save-instagram.png">
                </div>
            </div>
            <div class="advert_description">
                <p><?php echo $advertDetails['Title']; ?></p>
                <p>قیمت : <?php echo $advertDetails['Price']; ?></p>

                <p><?php echo $advertDetails['Description']; ?></p>
            </div>
        </div>
      <?php  if ($ownerDetails !== false) { ?>
        <div class="left_detail">
            <div class="call_title">
                <p>اطلاعات تماس</p>
                <hr>
            </div>
            <div class="advert_owner">
                <img src="./assets/img/icons8-male-user-64.png">
                <p><?php echo $ownerDetails['UserName'];?></p>
            </div>
            <div class="advert_owner_detail">
                <div>
                    <img  src="./assets/img/location.png">
                    <p> موقعیت مکانی :</p><br>
                    <p> زنجان</p>

                </div>
                <div>
                    <img  src="./assets/img/icons8-call-50.png">
                    <p> شماره تماس:</p><br>
                    <p> 09122411375</p>

                </div>
                <div>
                    <img  src="./assets/img/email.png">
                    <p>ایمیل : </p><br>
                    <p> hossein@gmail.com</p>


                </div>
            </div>
        </div>
        <?php
        } else {
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

