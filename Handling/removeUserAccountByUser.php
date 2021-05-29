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
$currUser = unserialize($_SESSION['loggedUser']);
$dbControl->RemoveUser($currUser->GetId());
$control = new UserControl();
$dbControl->GetUsers($control);
$allUser[] =  $control->GetAllUsers();

if(in_array($currUser, $allUser) == false)
{
    $msg = "You have successfully deleted your account!";
    $_SESSION['delete-account-msg'] = $msg;
    unset($_SESSION['loggedUser']);
    header('Location:../HTML-PHP/homepage.php');
}
?>