<?php 
// include('controller/AuthenticationController.php');
include('codes/AdvertCode.php');

if (session_status() === PHP_SESSION_NONE){session_start();}

// $data = $authenticated->authDetail();
    
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
<?php  include __DIR__."../views/templates/header.php";
?>
<div class="insertAdvert">
    <div class="advert_insert_title">
        <a><img src="./assets/img/icons8-home-50.png" alt="Home"></a>
        <h3>ثبت آگهی</h3>
        <!-- <?php echo $data['UserID'] ?> -->
    </div>
    <form method="POST" enctype="multipart/form-data">
        <div class="advert_insert_form Shabnam">
            <div class="in_ad_right">
                <div class="form-group">
                    <label for="title">عنوان آگهی:</label>
                    <input type="text" id="title" name="title" required>
                </div>

                <div class="form-group selects">
                    <div>
                        <label for="category">گروه آگهی:</label>
                        <select id="category" name="category" required>
                            <option value="1">لوازم خانگی</option>
                            <option value="2">وسایل نقلیه</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>

                    <div>
                        <label for="city">استان:</label>
                        <select id="city" name="city" required>
                            <option value="1">زنجان</option>
                            <option value="2">تهران</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="price">قیمت:</label>
                    <input type="text" id="price" name="price" required>
                </div>

                <div class="form-group">
                    <label for="description">توضیحات آگهی:</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
                </div>
            </div>

            <div class="in_ad_left">
                <div>
                    <label for="image">انتخاب عکس مناسب می‌تواند میزان بازدید آگهی شما را چند برابر افزایش دهد</label>
                </div>

                <div class="file-upload" onclick="triggerFileInput()">
                    <div>
                        <input type="file" id="image" name="image" accept="image/*" required onchange="previewImage()">
                    </div>
                    <div class="image-preview" id="image-preview">افزودن عکس +</div>
                </div>

                <div>
                <button type="submit" class="ad-register-btn" name="adAdvert_btn"  style="margin-top:20px" >ثبت آگهی</button>
                </div>
            </div>
        </div>
    </form>
</div>


   
    
<script>
    function triggerFileInput() {
    document.getElementById('image').click();
  }
function previewImage() {
    var preview = document.getElementById('image-preview');
    var fileInput = document.getElementById('image');
    var file = fileInput.files[0];
    var fileChoose = document.getElementById('file-choose');

    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = '<img src="' + e.target.result + '" alt="Preview">';
            fileChoose.textContent = 'تغییر تصویر';
        };
        reader.readAsDataURL(file);
    } else {
        preview.innerHTML = '';
        fileChoose.textContent = 'انتخاب تصویر';
    }
}
</script>
<?php  include __DIR__."../views/templates/footer.php";?>  
</body>
</html>