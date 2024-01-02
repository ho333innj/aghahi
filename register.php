<?php 
// include('config/app.php'); 
include('codes/authenticationCode.php');
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سایت آگهی و فروش nj</title>
    <link rel="stylesheet" href="./assets/style/style.css">
    <link rel="stylesheet" href="./assets/style/register.css">

</head>

<body>
<?php  include __DIR__."../views/templates/header.php";?>
       
        <!-- <div class="main-container Shabnam">
            <div class="login-form">
                    <div class="form-describtion">
                        <ul>
                            <li ><a href="#">ورود</a></li><span class="span">/</span>
                            <li ><a href="#">ثبت نام</a></li>
                        </ul>
                        <p class="title-2">لطفا برای ثبت نام اطلاعات خود را وارد کنید.</p>
                    </div>
                    <div class="form">
                        <form method="POST">
                            <label for="username" class="lable">  نام کاربری ؛ </label><br>
                            <input type="text" id="input" name="username" value=""><br>
                            <label for="email" class="lable">ایمیل :</label><br>
                            <input type="text" id="input" name="email" value=""><br>
                            <label for="password" class="lable">کلمه عبور :</label><br>
                            <input type="password" id="input" name="password" value=""><br>
                            <label for="password_c" class="lable">تکرار کلمه عبور</label><br>
                            <input type="password" id="input" name="password_c" value=""><br>
                            <input type="submit" value="ثبت نام" name="register_btn" style="margin-top: 2.5rem" class="blue-btn Shabnam">
                        </form>
                    </div>
            </div>
        </div>
       
       
    </div> -->

        <div class="register">

            <div class="form-half">
                <div class="head-form">
                    <h2>ثبت‌نام</h2>
                    <p><a href="login.php">قبلاً ثبت‌نام کرده‌اید؟</a></p>
                </div>
                <form  method="POST">
                    <div class="input-group">
                        <label for="email">ایمیل:</label><br>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="input-group">
                        <label for="mobile">موبایل:</label><br>
                        <input type="tel" id="mobile" name="mobile" required>
                    </div>
                    <div class="input-group">
                        <label for="username">نام و نام خانوادگی:</label><br>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="input-group">
                        <label for="password">رمز عبور:</label><br>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="input-group">
                        <label for="password_c">تکرار رمز عبور:</label><br>
                        <input type="password" id="password_c" name="password_c" required>
                    </div>
                    <input type="submit" value="ثبت نام" class="btn" name="register_btn">
                    <p><a href="login.php">ورود</a></p>
                </form>
            </div>
            <div class="image-half">
                <img src="./assets/img/greens.png" alt="عکس">
            </div>
        </div>
<?php  include __DIR__."../views/templates/footer.php";?>  
</body>
</html>