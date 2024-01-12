<?php
include('controller/authenticationController.php');
$data = (isset($_SESSION['authenticated'])) ? $authenticated->authDetail() : "";

// include 'config/app.php';
include 'controller/advertController.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_GET['query'])) {
    $searchQuery = mysqli_real_escape_string($advert->conn, $_GET['query']);
    $searchResults = $advert->searchAdverts($searchQuery);
}

$adverts = $advert->alladvertShow();
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
<?php include __DIR__ . '/views/templates/header.php'; ?>


    <div class="container">
    <form  method="GET">
        <div class="search-box">
            <input type="text" class="search-input" name="query" placeholder="جستجو در آگهی ها ...">
            <div class="select-box">
                <select name="category">
                    <option value="" disabled selected>دسته بندی :</option>
                    <option value="category1">وسایل نقلیه</option>
                    <option value="category2">وسایل نقلیه</option>
                    <!-- Add more categories as needed -->
                </select>
            </div>
            <div class="select-box">
                <select name="city">
                    <option value="" disabled selected>شهر :</option>
                    <option value="city1">زنجان</option>
                    <option value="city2">تهران</option>
                    <!-- Add more cities as needed -->
                </select>
            </div>
            <button type="submit" class="search-button">جستجو</button>
        </div>
    </form>
        <div class="main-index-container Shabnam">

            <div class="title">
                <div class="title-icon">
                <img src="./assets/img/kisspng-gray-wolf-moon-coyote-red-wolf-clip-art-wolf-5ab44881d4b9a9.0979797015217644818713.png">
                </div>
                <div class="title-text">
                    <h3>آگهی های جدید در همه ی ایران</h3>
                </div>
            </div>
            <div class="cards Sahel">
                <?php if (isset($searchResults) && $searchResults !== false) {
                    // Display search results
                    foreach ($searchResults as $result) { ?>
                        <a href="advertsdetail.php?id=<?php echo $result['AdvertID']; ?>">
                            <div class="card">
                                <img src="./uploads/<?php echo $result['image']; ?>" alt="Denim Jeans" style="width:100%">
                                <h3><?php echo $result['Title']; ?></h3>
                                <p class="card-price" id="amount"><?php echo $result['Price']; ?>; <span class="toman">تومان</span></p>
                                <p class="card-location"><?php echo $result['City_ID']; ?></p>
                                <p class="card-time">لحظاتی پیش</p>
                                <!-- <p class="card-button"><button>جزییات بیشتر</button></p> -->
                            </div>
                        </a>
                    <?php }
                } else {
                    // Display default adverts
                    if ($adverts !== false) {
                        foreach ($adverts as $advert) { ?>
                            <a href="advertsdetail.php?id=<?php echo $advert['AdvertID']; ?>">
                                <div class="card">
                                    <img src="./uploads/<?php echo $advert['image']; ?>" alt="Denim Jeans" style="width:100%">
                                    <h3><?php echo $advert['Title']; ?></h3>
                                    <p class="card-price" id="amount"><?php echo $advert['Price']; ?>; <span class="toman">تومان</span></p>
                                    <p class="card-location"><?php echo $advert['City_ID']; ?></p>
                                    <p class="card-time">لحظاتی پیش</p>
                                    <!-- <p class="card-button"><button>جزییات بیشتر</button></p> -->
                                </div>
                            </a>
                <?php }
                    }
                } ?>
            </div>

            <div class="buttom-show-more">
                <form action="#">
                    <button>نمایش بیشتر</button>
                </form>
            </div>
        </div>
    </div>


    <?php include __DIR__ . '/views/templates/footer.php'; ?>
    
</body>

</html>
