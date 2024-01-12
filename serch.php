<?php
if (isset($_GET['query'])) {
    $searchQuery = mysqli_real_escape_string($advert->conn, $_GET['query']);
    $searchResults = $advert->searchAdverts($searchQuery);
}


?>