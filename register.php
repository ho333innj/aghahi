<?php 
include('controller/authenticationController.php');
$access = $authenticated->IsLoggedIn();
if($access){
    redirect('شما لاگین شده اید. برای ثبت نام جدید لطفا از حساب کاربری خود خارج شوید' , 'hesabkarbari.php');
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سایت آگهی و فروش nj</title>
    <link rel="stylesheet" href="./assets/style/style.css">
    <link rel="stylesheet" href="./assets/style/login.css">

</head>

<body>
<?php  include __DIR__."../views/templates/header.php";?>
        <div class="login">

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