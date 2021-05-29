<?php include '../HTML-PHP/stylesheetScripts.php';?>
    <link rel="stylesheet" href="../CSS/editAccountDetails.css">
<?php
session_start();
if(isset($_SESSION['loggedUser'])) {
    ?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit selected user</title>
        <?php include '../HTML-PHP/stylesheetScripts.php';?>
    </head>
    <body>
    <?php include '../HTML-PHP/main.php';?>
    <script src="../JavaScript/removeSearchBar.js"></script>
    <?php
    if(isset($_SESSION['edit-user-msg']))
    {
        $msg = (string) $_SESSION['edit-user-msg'];
        echo '<h3 class="msg">' . $msg . '</h3>';
        unset($_SESSION['edit-user-msg']);
    }
    ?>

    <?php
    $loggedInUser = unserialize($_SESSION['loggedUser']);
    if(isset($_GET['userIndex']))
    {
        $userDbControl = new UserDbControl("studmysql01.fhict.local", "dbi454917", "dbi454917", "123");
        $userControl = new UserControl();
        $userDbControl->GetUsers($userControl);
        $users = $userControl->GetAllUsers();
        $userIndex = (int)$_GET['userIndex'];
        $indexToRemove  = -1;

        for ($i=0;$i<count($users);$i++)
        {
            if($users[$i]->GetId() == $loggedInUser->GetId())
            {
                $indexToRemove = $i;
            }
        }
        //unset($users[$indexToRemove]);
        array_splice( $users, $indexToRemove, 1);
        $selectedUser = $users[$userIndex];
    }
    ?>
    <form id="editAccForm" action="../Handling/editSelectedUser-handling.php" method="post">
        <label for="fName" class="editAccLabel">First name:</label><br>
        <input type="text" class="editAccTextField" class="editAccForm" id="fName" name="fName" value="<?php echo $selectedUser->GetFName()?>"<br><br>
        <label for="lName" class="editAccLabel">Last name:</label><br>
        <input type="text" class="editAccTextField" class="editAccForm" id="lName" name="lName" value="<?php echo $selectedUser->GetLName()?>"<br><br>
        <label for="email" class="editAccLabel">Email:</label><br>
        <input type="text" class="editAccTextField" class="editAccForm"  id="email" name="email" value="<?php echo $selectedUser->GetEmail()?>"<br><br>
    <?php
        if($selectedUser->GetIsAdmin()) {
            echo '<input type="checkbox" id="cbIsAdmin" name="isAdmin" value="checked" checked="checked">';
        }
        else{
            echo '<input type="checkbox" id="cbIsAdmin" name="isAdmin" value="checked">';
        }
        ?>

        <label for="isAdmin" class="adminCB">The user is admin</label><br>
        <button class="saveChangesButton" type="submit"><i class="far fa-save"></i> Save changes</button>
    </form>

    </body>
    </html>

    <?php
}
else{
    echo '<label id="notLoggedIn">In order to acces this page, please make sure to log in first</label><br>';
}
?>