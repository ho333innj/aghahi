<?php 
include('codes/AdvertCode.php');

if (session_status() === PHP_SESSION_NONE){session_start();}
if (!$authenticated->IsLoggedIn()) {
    // Redirect to the login page or any other page you prefer
    redirect("لطفاً وارد شوید", "login.php");
}
$editAdvertID = isset($_GET['id']) ? htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8') : '';
$advertDetails = $advert->getAdvertDetails($editAdvertID);

if (!$advertDetails) {
    echo 'Advert not found!';
    exit;
}
    
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
                        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($advertDetails['Title'], ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>

                    <div class="form-group selects">
                        <div>
                            <label for="category">گروه آگهی:</label>
                            <select id="category" name="category" required>
                                <option value="1" <?php echo ($advertDetails['Category_ID'] == 1) ? 'selected' : ''; ?>>لوازم خانگی</option>
                                <option value="2" <?php echo ($advertDetails['Category_ID'] == 2) ? 'selected' : ''; ?>>وسایل نقلیه</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>

                        <div>
                            <label for="city">استان:</label>
                            <select id="city" name="city" required>
                                <option value="1" <?php echo ($advertDetails['City_ID'] == 1) ? 'selected' : ''; ?>>زنجان</option>
                                <option value="2" <?php echo ($advertDetails['City_ID'] == 2) ? 'selected' : ''; ?>>تهران</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price">قیمت:</label>
                        <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($advertDetails['Price'], ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="description">توضیحات آگهی:</label>
                        <textarea id="description" name="description" rows="4" required><?php echo htmlspecialchars($advertDetails['Description'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                    </div>
                </div>

                <div class="in_ad_left">
                    <div>
                        <label for="image">انتخاب عکس:</label>
                    </div>

                    <div class="file-upload" onclick="triggerFileInput()">
                        <div>
                            <input type="file" id="image" name="image" accept="image/*" onchange="previewImage()">
                        </div>
                        <div class="image-preview" id="image-preview">
                            <?php
                            // Check if there is an existing image
                            if (!empty($advertDetails['image'])) {
                                $existingImagePath = "./uploads/" . htmlspecialchars($advertDetails['image'], ENT_QUOTES, 'UTF-8');
                                echo '<img src="' . $existingImagePath . '" alt="Existing Image">';
                            } else {
                                echo 'افزودن عکس +';
                            }
                            ?>
                        </div>
                    </div>

                    <div>
                        <input type="hidden" name="editAdvertID" value="<?php echo $editAdvertID; ?>">
                        <button type="submit" class="ad-register-btn" name="editAdvert_btn" style="margin-top:20px">
                            <?php echo isset($advertDetails) ? 'ویرایش آگهی' : 'ثبت آگهی'; ?>
                        </button>
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