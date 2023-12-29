<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سایت آگهی و فروش nj</title>
    <link rel="stylesheet" href="./assets/style/style.css">
</head>

<body>
<?php  include __DIR__."../views/templates/header.php";?>

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
                    <p class="text-w">خوش آمدید : حسین جان</p>
                    <form>
                        <input type="submit" value="خروج" name="logout_btn">
                    </form>
                </div>
            </div>
            <div class="middleprofile">
                <div class="profile_img">
                <img src="./assets/img/gtr.jpg">
                </div>
                <div class="ad_count_num">
                    <div>
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
            <div class="">

            </div>
          
        </div>
    </div>
    <?php  include __DIR__."../views/templates/footer.php";?>  
</body>
</html>