<?php include '../LogicLayer/UserControl.php'; ?>
<?php
 session_start();
 /*$currUser = unserialize($_SESSION['loggedUser']);*/

 $cookie_name = "user-email";
 /*$cookie_value = $currUser->GetEmail();*/

setcookie($cookie_name, '', time() + (60 * 1), "/");
 unset($_SESSION['loggedUser']);
 header("Location:../HTML-PHP/homepage.php");
?>