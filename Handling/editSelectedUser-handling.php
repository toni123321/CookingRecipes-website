<?php include '../DataLayer/UserDbControl.php'; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $control = new UserControl();
    $dbControl = new UserDbControl();
    $dbControl->GetUsers($control);

    function FindUser($email, UserControl $control){
        foreach ($control->GetAllUsers() as $user)
        {
            if($email == $user->GetEmail() ){
                return $user;
            }
        }
        return null;
    }

    session_start();

    $fname = $_POST["fName"];
    $lname = $_POST["lName"];
    $email = $_POST["email"];


    if(isset($_POST["isAdmin"])){
        $isAdmin = (bool) $_POST["isAdmin"];
    }
    else{
        $isAdmin = false;
    }

    $currUser = unserialize($_SESSION['loggedUser']);

    $dbControl = new UserDbControl();
    $password = $currUser->GetPassword();

    $userToEdit = FindUser($email, $control);

    $user = new User($userToEdit->GetID(), $fname, $lname, $email, $password, $isAdmin);

    $dbControl->UpdateUser($user);
    $dbControl->GetUsers($control);
    $users = $control->GetAllUsers();

    $indexToRemove  = -1;
    for ($i=0;$i<count($users);$i++)
    {
        if($users[$i]->GetId() == $currUser->GetId())
        {
            $indexToRemove = $i;
        }
    }
    unset($users[$indexToRemove]);

    $indexEditedUser  = -1;
    for ($x=0;$x<count($users);$x++)
    {
        if($users[$x] != null){

            if($users[$x]->GetId() == $userToEdit->GetId())
            {
                $indexEditedUser = $x;
            }
        }
    }

    header('Location:../HTML-PHP/editSelectedUser.php?userIndex=' . $indexEditedUser);
}
?>
