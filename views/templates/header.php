<header class="header">
    

<div class="nav-header Shabnam">
    
    <div class="logo-header d-flex">
        <div class="logo-image">
            <img src="./assets/img/kisspng-gray-wolf-moon-coyote-red-wolf-clip-art-wolf-5ab44881d4b9a9.0979797015217644818713.png">
        </div>
        <div class="logo-text Shabnam">
            <a href="<?php echo base_url('index.php'); ?>">آگهی وفروش </a>
        </div>
    </div>
    <div>
        <ul>
            <li>
                <img src="./assets/img/icons8-home-40.png">
                <a href="<?php echo base_url('index.php'); ?>">صفحه اصلی</a>
            </li>
            <li>
                <img src="./assets/img/icons8-star-40.png">
                <a href="#"> ذخیره ها</a>
            </li>
            <li>
                <img src="./assets/img/icons8-call-40.png">
                <a href="#"> تماس با ما</a>
            </li>
        </ul>
    </div>
</div>
<div class="nav-header Shabnam">
    <ul>
        <li>
            <?php if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true) : ?>
                <a href="hesabkarbari.php">
                <div class="dropdown">
                    <div class="dropdown-couple">
                    <img class="prof_img" src="<?php echo isset($data['Image']) ? './uploads/profile/' . $data['Image'] : './assets/img/user.png'; ?>">
                        <a href="hesabkarbari.php"><button class="dropbtn">حساب من</button></a>
                    </div>
                    <div class="dropdown-content">
                        <a href="hesabkarbari.php">حساب کاربری</a>
                        <a href="<?php echo base_url('editprofile.php'); ?>">پروفایل</a>
                        <a href="#">سبد خرید</a>
                        <hr>
                        <form method="POST">
                        <input class="red_btn" type="submit" value="خروج" name="logout_btn">
                        </form>                    
                    </div>
                </div>
                </a>
                
            <?php else : ?>
                <img src="./assets/img/icons8-test-account-40.png">
                <a href="<?php echo base_url('login.php'); ?>">  ورود / ثبت نام</a>
            <?php endif; ?>
        </li>
        <li>
            <a href="<?php echo base_url('insertAdvert.php'); ?>" class="ad-reg-btn"> + ثبت آگهی</a>
        </li>
    </ul>
</div>

</header>

<?php include('message.php') ?>
