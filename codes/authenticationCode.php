<?php
// include('config/app.php');
include_once 'controller/RegisterController.php';
include_once 'controller/LoginController.php';

$auth = new LoginController();

if (isset($_POST['logout_btn'])) {
    // echo "Logout button clicked!";

    $checkedLoggedOut = $auth->Logout();

    if ($checkedLoggedOut) {
        // echo "Logout button clicked!";

        redirect('Logged Out Successfully ' , 'index.php');
    }
}

if (isset($_POST['login_btn'])) {
    $email = validateInput($db->conn, $_POST['email']);
    $password = validateInput($db->conn, $_POST['password']);

    $checkLogin = $auth->Login($email, $password);

    if ($checkLogin) {
        redirect('Logged In Successfully', 'hesabkarbari.php');
    } else {
        redirect('Invalid Email Id or Password', 'login.php');
    }
}


if (isset($_POST['register_btn']))
{
    $username = validateInput($db->conn, $_POST['username']);
    $email = validateInput($db->conn, $_POST['email']);
    $mobile = validateInput($db->conn, $_POST['mobile']);
    $password = validateInput($db->conn, $_POST['password']);
    $password_c = validateInput($db->conn, $_POST['password_c']);
    // $HashedPassword = md5($password);
    $hashedpassword = password_hash($password, PASSWORD_BCRYPT);


    $register = new RegisterController();
    $result_password = $register->confirm_Password($password , $password_c);

    if ($result_password)
    {
        $resultUniqUser = $register->isUserExists($email);
        if ($resultUniqUser)
        {
            redirect('ایمیل قبلا استفاده شده است', 'register.php');
        }else{
            $register_query = $register->registration($username, $email, $mobile, $password);
            if ($register_query) {
                redirect('ثبت نام با موفقیت انجام شذ', 'login.php');
            } else {
                redirec('خطایی رخ داده است', 'register.php');
            }
        }
    }else{
        redirect('Password and Confirm Password Does not match', 'register.php');
    }
}

