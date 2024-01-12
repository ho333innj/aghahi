<?PHP 
include('controller/authenticationController.php');
include('controller/advertController.php');

if (session_status() === PHP_SESSION_NONE){session_start();}

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
</head>

<body>
<?php  include __DIR__."/views/templates/header.php";
 
?>  


    <div class="container">

        <div class="main-container Shabnam">

            <div class="topprofile_index">
                <div class="tp_lists">
                    <ul>
                        <li>
                        <img src="./assets/img/icons8-home-50 (2).png">
                        </li>
                        <span class="text-w">|</span>
                        <li>
                            <a>حساب من</a>
                        </li>
                        <span class="text-w">|</span>

                        <li>
                            <a>آگهی های من</a>
                        </li>
                    </ul>
                </div>
                <div class="tp_geetingandlogout">
                    <p class="text-w">خوش آمدید :<?php echo $UserName; ?></p>
                    <form method="POST">
                        <input type="submit" value="خروج" name="logout_btn">
                    </form>
                </div>
            </div>
            <div class="middleprofile d-flex">
                <div class="profile_img">
                <img src="./assets/img/gtr.jpg">
                </div>
                <div class="ad_count_num d-flex">
                    <div class="count_image">
                        <a>
                        <img src="./assets/img/icons8-pass-fail-64.png">
                        </a>
                    </div>
                    <div>
                        <p>تعداد آگهی های من :</p>
                        <p>0</p>
                    </div>
                    
                </div>

            </div>
            <!-- <div class="adverts_cards">
                    <div class="ad_cr_title">
                        <h1>آگهی های من</h1>
                    </div>
                    <div class="no_ad_image">
                        <img src="./assets/img/—Pngtree—no result search icon_6511543.png" >
                        <a herf="#">ثبت آگهی جدید</a>

                    </div>
            </div> -->
                 <!-- echo $advert['Title']; -->
        <div class="cards Sahel">
        <?php   if ($adverts !== false) {
    foreach ($adverts as $advert) { ?>
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
                <?php  }
} ?>
               
            </div>
          

  <div class="buttom-show-more">
                <form action="#">
                    <button>نمایش بیشتر</button>
                </form>
            </div>
         
          
        </div>
    </div>
    <?php  include __DIR__."/views/templates/footer.php";?>  
</body>
</html>