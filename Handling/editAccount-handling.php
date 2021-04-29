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
$dbControl = new UserDbControl();
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
    $dbControl = new UserDbControl();

    $password = $currUser->GetPassword();

    //password check
    if($newPassword == $confNewPassword && $newPassword != $currPassword && $currPassword == $password){
        $password = $newPassword;
    }
    else if($newPassword == $password){
        //todo
    }
    else{
        //todo
    }

    $dbControl->UpdateUser($currUser->GetID(),$fname, $lname, $email, $password);

    $dbControl->GetUsers($control);

    $_SESSION['loggedUser'] = serialize(FindUser($currUser->GetId(), $control));

    header("Location:../HTML-PHP/accountPage.php");
}
?>
</body>
</html>
