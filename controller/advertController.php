<?php 
// include('config/app.php');
class AdvertController
{
    public function __construct() 
    {
        
        $db= new DatabaseConnection; 
        $this->conn= $db->conn;
    }

    public function insertAdvert($city_id, $user_id, $category_id, $title, $description, $price, $image)
    {
        // Assuming you have a table named 'adverts'
        $insertadvert = "INSERT INTO `adverts` (`city_id`, `user_id`, `category_id`, `title`, `description`, `price`, `image`) 
                  VALUES ('$city_id', '$user_id', '$category_id', '$title', '$description', '$price', '$image')";
       
       $result= $this->conn->query($insertadvert); 

        if ($result)
         {
            return true;
        } else {
            return false;
        }
    }
    public function advertShow($user_id)
    {
        $checkAdvert = "SELECT * FROM adverts WHERE User_ID = '$user_id'";
        $result = $this->conn->query($checkAdvert);
    
        if ($result->num_rows > 0) {
            $adverts = array();
    
            // Fetch each row as an associative array
            while ($advert = $result->fetch_assoc()) {
                // Append the row to the array
                $adverts[] = $advert;
            }
    
            return $adverts;
        } else {
            return false; // No adverts found for the user
        }
    }
    public function alladvertShow()
    {
        $checkAdvert = "SELECT * FROM adverts";
        $result = $this->conn->query($checkAdvert);
    
        if ($result->num_rows > 0) {
            $adverts = array();
    
            // Fetch each row as an associative array
            while ($advert = $result->fetch_assoc()) {
                // Append the row to the array
                $adverts[] = $advert;
            }
    
            return $adverts;
        } else {
            return false; // No adverts found for the user
        }
    }

    public function getAdvertDetails($advertID)
    {
        $getAdvertDetails = "SELECT * FROM adverts WHERE AdvertID = '$advertID' LIMIT 1";
        $result = $this->conn->query($getAdvertDetails);
    
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false; // Advert not found
        }
    }
    public function getUserDetails($userID)
    {
        $getUser = "SELECT * FROM users WHERE UserID = '$userID'";
        $result = $this->conn->query($getUser);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); // Return user details as an associative array
        } else {
            return false; // User not found
        }
    }
    public function getCityNameById($cityID)
    {
        // Assuming you have a table named 'cities'
        $getCityName = "SELECT CityName FROM cities WHERE CityID = '$cityID' LIMIT 1";
        $result = $this->conn->query($getCityName);

        if ($result->num_rows > 0) {
            $city = $result->fetch_assoc();
            return $city['CityName'];
        } else {
            return 'نامشخص'; // You can set a default value if the city is not found
        }
    }
    public function deleteAdvert( $advertIDToDelete)
    {
        $deleteAdvert = "DELETE FROM adverts WHERE AdvertID = ' $advertIDToDelete'";
        $result = $this->conn->query($deleteAdvert);

        if ($result) {
            return true; // Successfully deleted
        } else {
            return false; // Deletion failed
        }
    }
    public function updateAdvert($advertID, $city_id, $category_id, $title, $description, $price, $image)
{
    $updateAdvert = "UPDATE `adverts` SET 
                     `city_id` = '$city_id', 
                     `category_id` = '$category_id', 
                     `title` = '$title', 
                     `description` = '$description', 
                     `price` = '$price', 
                     `image` = '$image' 
                     WHERE `AdvertID` = '$advertID'";

    $result = $this->conn->query($updateAdvert);

    if ($result) {
        return true; // Successfully updated
    } else {
        return false; // Update failed
    }
}
public function searchAdverts($searchQuery)
{
    // Assuming you have a table named 'adverts'
    $searchAdverts = "SELECT * FROM adverts WHERE title LIKE '%$searchQuery%' OR description LIKE '%$searchQuery%'";
    $result = $this->conn->query($searchAdverts);

    if ($result->num_rows > 0) {
        $searchResults = array();

        // Fetch each row as an associative array
        while ($advert = $result->fetch_assoc()) {
            // Append the row to the array
            $searchResults[] = $advert;
        }

        return $searchResults;
    } else {
        return false; // No results found
    }
}
   
    
}
$advert = new AdvertController();

?>
