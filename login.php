<?php 
include('config/app.php'); 
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
    <?php include __DIR__ . "../views/templates/header.php"; ?>

 
        <div class="login">

            <div class="form-half">
                <div class="head-form">
                    <h2>ورود</h2>
                    <p><a href="register.php">هنوز ثبت‌نام نکرده‌اید؟</a></p>
                </div>
                <form method="POST">
                    <div class="input-group">
                        <label for="email">ایمیل:</label><br>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="input-group">
                        <label for="password">رمز عبور:</label><br>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <input type="submit" value="ورود" class="btn" name="login_btn">
                    <p><a href="register.php">ثبت نام</a></p>
                </form>
            </div>
            <div class="image-half">
                <img src="./assets/img/greens.png" alt="عکس">
            </div>
        </div>
    <?php include __DIR__ . "../views/templates/footer.php"; ?>
</body>

</html>