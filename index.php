<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'controller/authenticationController.php';
$data = isset($_SESSION['authenticated']) ? $authenticated->authDetail() : '';

include 'controller/advertController.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$advert = new AdvertController(); // Assuming AdvertController is the correct class name

$searchQuery = isset($_GET['query']) ? mysqli_real_escape_string($advert->conn, $_GET['query']) : null;
$categoryId = isset($_GET['category']) ? $_GET['category'] : null;
$cityId = isset($_GET['city']) ? $_GET['city'] : null;

if ($searchQuery || $categoryId || $cityId) {
    // Search or filter functionality
    $searchAndFilterResults = $advert->searchAndFilterAdverts($searchQuery, $categoryId, $cityId);
} else {
    // Default case: Show all advertisements
    $searchAndFilterResults = $advert->alladvertShow();
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
    <?php include __DIR__ . '/views/templates/header.php'; ?>

    <div class="container">
        <form method="GET">
            <div class="search-box">
                <input type="text" class="search-input" name="query" placeholder="جستجو در آگهی ها ...">
                <div class="select-box">
                    <select name="category">
                        <option value="" disabled selected>دسته بندی :</option>
                        <?php
                        $categories = $advert->getCategories();
                        if (!empty($categories)) {
                            foreach ($categories as $category) {
                                $selected = isset($_GET['category']) && $_GET['category'] == $category['CategoryID'] ? 'selected' : '';
                                echo '<option value="' . $category['CategoryID'] . '" ' . $selected . '>' . $category['CategoryName'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="select-box">
                    <select name="city">
                        <option value="" disabled selected>شهر :</option>
                        <?php
                        $cities = $advert->getCities();
                        if (!empty($cities)) {
                            foreach ($cities as $city) {
                                $selected = isset($_GET['city']) && $_GET['city'] == $city['CityID'] ? 'selected' : '';
                                echo '<option value="' . $city['CityID'] . '" ' . $selected . '>' . $city['CityName'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" class="search-button">جستجو</button>
            </div>
        </form>
        <div class="main-index-container Shabnam">
            <div class="title">
                <div class="title-icon">
                    <img src="./assets/img/kisspng-wolf-logo-esports-clip-art-league-of-legends-5b9a61e8222047.6161969715368442641398.png">
                </div>
                <div class="title-text">
                    <a href="ibdex2.php">آگهی های جدید در همه ی ایران</a>
                </div>
            </div>
            <div class="cards Sahel">
                <?php
                if ($searchAndFilterResults !== false) {
                    foreach ($searchAndFilterResults as $result) {
                ?>
                        <a href="advertsdetail.php?id=<?php echo $result['AdvertID']; ?>">
                            <div class="card">
                                <img src="./uploads/<?php echo $result['image']; ?>" alt="Denim Jeans" style="width:100%">
                                <h3><?php echo $result['Title']; ?></h3>
                                <p class="card-price" id="amount">قیمت : <?php echo $result['Price']; ?></p>
                                <p class="card-time">لحظاتی پیش</p>
                            </div>
                        </a>
                <?php
                    }
                } else {
                    // Handle case when no results are found
                    echo '<div>
                    <a href="ibdex2.php">نتیجه یاقت نشد. برای مشاهده همه آگهی ها کایک کنید</a>
                    </div>';
                }
                ?>
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
