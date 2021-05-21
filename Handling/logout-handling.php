<?php include '../LogicLayer/UserControl.php'; ?>
<?php
 session_start();
 /*$currUser = unserialize($_SESSION['loggedUser']);*/

 $cookie_name = "user-email";
 /*$cookie_value = $currUser->GetEmail();*/

if(isset($_COOKIE[$cookie_name]))
{
    setcookie($cookie_name, '', time() - (60 * 5), "/");
}
 unset($_SESSION['loggedUser']);
 header("Location:../HTML-PHP/homepage.php");
?>