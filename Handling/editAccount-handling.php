<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
<body>
<?php include '../DataLayer/UserDbControl.php'; ?>
<?php
$control = new UserControl();
$dbControl = new UserDbControl("studmysql01.fhict.local", "dbi454917", "dbi454917", "123");
$dbControl->GetUsers($control);

function FindUser($id, UserControl $control){
    foreach ($control->GetAllUsers() as $user)
    {
        if($id == $user->GetId() ){
            return $user;
        }
    }
    return null;
}

session_start();

$fname = $_POST["fName"];
$lname = $_POST["lName"];
$email = $_POST["email"];
$newPassword = $_POST["newPassword"];
$confNewPassword = $_POST["confNewPassword"];
$currPassword = $_POST["currPassword"];

$currUser = unserialize($_SESSION['loggedUser']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dbControl = new UserDbControl("studmysql01.fhict.local", "dbi454917", "dbi454917", "123");

    $password = $currUser->GetPassword();

    //password check
    if($newPassword == $confNewPassword && $newPassword != $currPassword && $currPassword == $password){
        $password = $newPassword;

        $msg = "You have successfully updated your password.";
        $_SESSION['edit-pass-msg'] = $msg;
    }
    else if($newPassword == $password){
        $msg = "The new password is the same as the currently set one.";
        $_SESSION['edit-pass-msg'] = $msg;
    }
    else{
        $msg = "In order to set a new password, please, make sure to enter the current one correctly.";
        $_SESSION['edit-pass-msg'] = $msg;
    }

    $user = new User($currUser->GetID(), $fname, $lname, $email, $password, $currUser->GetIsAdmin());

    $dbControl->UpdateUser($user);


    $dbControl->GetUsers($control);

    $_SESSION['loggedUser'] = serialize(FindUser($currUser->GetId(), $control));

    header("Location:../HTML-PHP/accountPage.php");
}
?>
</body>
</html>
