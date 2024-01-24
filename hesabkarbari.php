<?PHP 

include('controller/authenticationController.php');
include('controller/advertController.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// include('codes/AdvertCode.php');
if (!$authenticated->IsLoggedIn()) {
    // Redirect to the login page or any other page you prefer
    redirect("لطفاً وارد شوید", "login.php");
}
$data = $authenticated->authDetail();
$user_id = $data['UserID'];
$UserName=$data['UserName'];

$adverts= $advert->advertShow($user_id);

?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سایت آگهی و فروش nj</title>
    <link rel="stylesheet" href="./assets/style/style.css">
    <!-- <link rel="stylesheet" href="./assets/style/login.css"> -->

</head>

<body>
<?php  include __DIR__."/views/templates/header.php";?>  


    <div class="container">

        <div class="main-container Shabnam">

            <div class="topprofile_index">

                <div class="tp_lists">
                    <ul>
                        <li>
                       <a href="index.php"><img src="./assets/img/icons8-home-50 (2).png"> </a> 
                        </li>
                        <span class="text-w">|</span>
                        <li>
                            <a href="hesabkarbari.php">حساب من</a>
                        </li>
                        <span class="text-w">|</span>

                        <li>
                            <a href="editProfile.php">پروفایل</a>
                        </li>
                    </ul>
                </div>
                <div class="tp_geetingandlogout">
                    <p class="text-w"> خوش آمدید : <?php echo $UserName; ?></p>
                    <form method="POST">
                        <input type="submit" value="خروج" name="logout_btn">
                    </form>
                </div>
            </div>

            <div class="middleprofile d-flex">
                <div class="profile_img">
                <img  src="<?php echo isset($data['Image']) ? './uploads/profile/' . $data['Image'] : './assets/img/user.png'; ?>">
                </div>
                <div class="ad_count_num d-flex">
                    <div class="count_image">
                        <a>
                        <img src="./assets/img/icons8-pass-fail-64.png">
                        </a>
                    </div>
                    <div>
                        <p>تعداد آگهی های من :</p>
                        <p>
                        <?php echo is_array($adverts) ? count($adverts) : 0; ?>
                        </p>
                    </div>
                    
                </div>

            </div>

          

        <div class="adverts_cards">
            <div class="ad_cr_title">
                <h1>آگهی های من</h1>
            </div>
    <div class="main-index-container">
    <div class="cards Sahel">
    <?php if (is_array($adverts) && count($adverts) > 0) {
        foreach ($adverts as $advert) { ?>
            <div class="card">
                <a href="profile-advertdetail.php?id=<?php echo $advert['AdvertID']; ?>">
                    <div>
                        <img src="./uploads/<?php echo $advert['image']; ?>" alt="Denim Jeans" style="width:100%">
                        <h3><?php echo $advert['Title']; ?></h3>
                        <p class="card-price" id="amount">قیمت :<?php echo $advert['Price']; ?><span style="margin-right:5px;"> تومان  </span></p>
                        <p class="card-time">لحظاتی پیش</p>
                    </div>
                    
                </a>
            </div>
        <?php }
        
    } else { ?>
    </div>

</div>
        <div class="no_ad_image">
            <img src="./assets/img/—Pngtree—no result search icon_6511543.png">
            <a href="<?php echo base_url('insertAdvert.php'); ?>">ثبت آگهی جدید</a>
        </div>
    <?php } ?>


    
            
        </div>
          
    </div>
<?php  include __DIR__."/views/templates/footer.php";?>  
</body>
</html>
