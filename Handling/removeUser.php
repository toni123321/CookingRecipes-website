<?php include '../DataLayer/UserDbControl.php'; ?>
<?php
$userDbControl = new UserDbControl();
$userControl = new UserControl();

$userDbControl->GetUsers($userControl);
$users = $userControl->GetAllUsers();

if(isset($_GET['userIndex']))
{
    session_start();
    $currUser = unserialize($_SESSION['loggedUser']);
    $userIndex = (int) $_GET['userIndex'];

    $indexToRemove = -1;

    for ($i=0;$i<count($users);$i++)
    {
        if($users[$i]->GetId() == $currUser->GetId())
        {
            $indexToRemove = $i;
        }
    }
    unset($users[$indexToRemove]);

    $user = $users[$userIndex];
    //echo $user->GetId();
    $userDbControl->RemoveUser($user->GetId());

    $msg = "You have successfully deleted user with id: {$user->GetId()}";
    $_SESSION['delete-user-msg'] = $msg;
    header('Location:../HTML-PHP/manageUsers.php');

}


?>