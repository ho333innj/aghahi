<?php
if (session_status() === PHP_SESSION_NONE) session_start();

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_DATABASE','advert');

define ('SITE_URL' , 'http://localhost/agahi/');


include_once ('databaseConnection.php');
$db = new databaseConnection;

function base_url($slug) 
{
    echo SITE_URL.$slug; 
}
function redirect($message, $page)
{
    $redirectTo = SITE_URL.$page;
    $_SESSION['message'] = "$message";
    header("Location: $redirectTo");
    exit(0); 
}

function validateInput($dbcon, $input) 
{
    return mysqli_real_escape_string($dbcon , $input); 
}

?>