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

    <div class="insert_ad_container Shabnam">
        <div class="insertAdvert">
            <div class="advert_insert_title">
                <a><img src="./assets/img/icons8-home-50.png"></a>
                <h3>ثبت آگهی</h3>
            </div>
            <div class="advert_insert_form d-flex">
                <div class="in_ad_right">
                    <form method="post" enctype="multipart/form-data">
                        <div>
                            <label for="advertTitle">عنوان آگهی :</label><br>
                            <input type="text" id="advertTitle" name="advertTitle" required><br>
                        </div>
                        <div class="selects d-flex">
                            <div class="selects1">
                                <label for="advertCategory">گروه آگهی</label><br>
                                    <select class="selects1" id="advertCategory" name="advertCategory" required>
                                        <option value="category1">لوازم خانگی</option>
                                        <option value="category2">البسه</option>
                                        <!-- Add more options as needed -->
                                    </select><br>
                            </div>
                            <div class="selects2">
                                <label for="advertCity">استان :</label><br>
                                    <select class="selects2" id="advertCity" name="advertCity" required>
                                        <option value="city1">City 1</option>
                                        <option value="city2">City 2</option>
                                        <option value="city3">City 3</option>
                                        <!-- Add more options as needed -->
                                    </select><br>
                            </div>
                            
                            
                        </div>

                    

                    
                        <div>
                            <label for="price">قیمت :</label><br>
                            <input type="text" id="price" name="price" required><br>
                        </div>
                    
                        <div>
                            <label for="description">توضیحات آگهی</label><br>
                            <textarea id="description" name="description" rows="4" required></textarea>
                        </div>
        
                </div>
                <div class="in_ad_left">
                    <label for="image">Upload Image:</label><br>
                        <input type="file" id="image" name="image" accept="image/*" required><br>
                        <input type="submit" name="ad_advert" value="Submit Advert">
                    </form>
                </div>
            </div>
            
        </div>
       
    </div>
    
<?php  include __DIR__."../views/templates/footer.php";?>  
</body>
</html>