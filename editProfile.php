<?PHP 
include('codes/editProfileCode.php');
$data = $authenticated->authDetail();
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
                    <p class="text-w"> خوش آمدید : <?php echo $data['UserName']; ?></p>
                        <form method="POST">
                            <input type="submit" value="خروج" name="logout_btn">
                        </form>
                    </div>
                </div>
            
                <div class="middleprofile d-flex">
                    <div class="profile_img">
                    <img src="./uploads/profile/<?php echo $data['Image']; ?>">
                    </div>
                </div>
        </div>

        <div class="main-index-container">
                <div class="insertAdvert">
                    <div class="advert_insert_title">
                        <a><img src="./assets/img/icons8-home-50.png" alt="Home"></a>
                        <h3>ویرایش پروفایل</h3>
                    </div>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="advert_insert_form Shabnam">
                            <div class="in_ad_right">
                                <div class="form-group">
                                    <label for="username">نام ونام خانوادگی :</label>
                                    <input type="text" id="username" name="username" required  value="<?php echo isset($data['UserName']) ? $data['UserName'] : ''; ?>">

                                </div>
                                <div class="form-group">
                                    <label for="mobile">شماره موبایل :</label>
                                    <input type="text" id="mobile" name="mobile" required value="<?php echo isset($data['UserName']) ? $data['Mobile'] : ''; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="address">آدرس :</label>
                                    <textarea id="address" name="address" rows="4" required ><?php echo isset($data['address']) ? $data['address'] : ''; ?></textarea>
                                </div>
                            </div>

                            <div class="in_ad_left">
                                <div>
                                    <label for="image">برای پروفایل خود عکس انتخاب کنید.</label>
                                </div>
                                <div class="file-upload" onclick="triggerFileInput()">
                                <div>
                                <!-- Hidden file input -->
                                <input type="file" id="image" name="image" accept="image/*" required onchange="previewImage()">
                                </div>
                                <div class="image-preview" id="image-preview">
                                    <img id="preview-image" src="./uploads/profile/<?php echo $data['Image']; ?>" alt="Preview">
                                    <span id="file-choose"><?php echo empty($data['Image']) ? 'افزودن عکس +' : 'تغییر تصویر'; ?></span>
                                </div>
                                </div>



                                <div>
                                <button type="submit" class="ad-register-btn" name="editProfile_btn"  style="margin-top:20px" >ذخیره تغییرات</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </div>        
    </div>

<?php  include __DIR__."/views/templates/footer.php";?>  
    <script>
    function triggerFileInput() {
    document.getElementById('image').click();
    }
    function previewImage() {
    var preview = document.getElementById('preview-image');
    var fileInput = document.getElementById('image');
    var file = fileInput.files[0];
    var fileChoose = document.getElementById('file-choose');

    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            fileChoose.textContent = 'تغییر تصویر';
        };
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        fileChoose.textContent = 'انتخاب تصویر';
    }
    }
</script> 
</body>
</html>