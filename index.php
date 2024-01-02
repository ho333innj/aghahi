<?php 
// include('config/app.php');
include('codes/authenticationCode.php');
if (session_status() === PHP_SESSION_NONE)
{
   session_start();
} ?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سایت آگهی و فروش nj</title>
    <link rel="stylesheet" href="./assets/style/style.css">
</head>

<body>


    <div class="container">
        <div class="main-container Shabnam">
        <?php  include __DIR__."/views/templates/header.php";?>

            <div class="title">
                <div class="title-icon">
                    <img src="./assets/img/TransitArts_Logo.png" class="black-white">
                </div>
                <div class="title-text">
                    <h3>آگهی های جدید در همه ی ایران</h3>
                </div>
            </div>
            <div class="cards Sahel">
                
                <a href="#">
                    <div class="card">
                        <img src="./assets/img/gtr.jpg" alt="Denim Jeans" style="width:100%">
                        <h3>لباسشویی</h3>
                        <p class="card-price" id="amount">16000000&nbsp;&nbsp; <span class="toman">تومان</span></p>
                        <p class="card-location">تهران بهارستان</p>
                        <p class="card-time">لحظاتی پیش</p>
                        <!-- <p class="card-button"><button>جزییات بیشتر</button></p> -->
                    </div>
                </a>
                <a href="#">
                    <div class="card">
                        <img src="./assets/img/gtr.jpg" alt="Denim Jeans" style="width:100%">
                        <h3>لباسشویی</h3>
                        <p class="card-price" id="amount">16000000&nbsp;&nbsp; <span class="toman">تومان</span></p>
                        <p class="card-location">تهران بهارستان</p>
                        <p class="card-time">لحظاتی پیش</p>
                        <!-- <p class="card-button"><button>جزییات بیشتر</button></p> -->
                    </div>
                </a>
               
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