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
       
        <div class="main-container Shabnam">
            <div class="login-form">
                    <div class="form-describtion">
                        <ul>
                            <li ><a href="#">ورود</a></li><span class="span">/</span>
                            <li ><a href="#">ثبت نام</a></li>
                        </ul>
                        <p class="title-2">لطفا برای ثبت نام اطلاعات خود را وارد کنید.</p>
                    </div>
                    <div class="form">
                        <form action="/action_page.php">
                            <label for="username" class="lable">  نام کاربری ؛ </label><br>
                            <input type="text" id="input" name="username" value=""><br>
                            <label for="username" class="lable">ایمیل :</label><br>
                            <input type="text" id="input" name="username" value=""><br>
                            <label for="password" class="lable">کلمه عبور :</label><br>
                            <input type="password" id="input" name="password" value=""><br>
                            <label for="password" class="lable">تکرار کلمه عبور</label><br>
                            <input type="password" id="input" name="password" value=""><br>
                            <input type="submit" value="ثبت نام" style="margin-top: 2.5rem" class="blue-btn Shabnam">
                        </form>
                    </div>
            </div>
        </div>
       
       
    </div>
       
<?php  include __DIR__."../views/templates/footer.php";?>  
</body>
</html>