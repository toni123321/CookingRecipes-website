<?php include '../HTML-PHP/stylesheetScripts.php';?>
    <link rel="stylesheet" href="../CSS/editAccountDetails.css">
<?php
session_start();
if(isset($_SESSION['loggedUser'])) {?>
    <?php include '../DataLayer/UserDbControl.php';?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recipe website</title>
        <link rel="stylesheet" href="../CSS/main-styles.css">
        <!-- for the icons (searchBar) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    <?php include '../HTML-PHP/main.php';?>
    <script src="../Libraries/jquery-3.6.0.min.js"></script>
    <script src="../JavaScript/removeSearchBar.js"></script>
    <?php
    $loggedInUser = unserialize($_SESSION['loggedUser']);
    if(isset($_GET['userIndex']))
    {
        $userDbControl = new UserDbControl();
        $userControl = new UserControl();
        $userDbControl->GetUsers($userControl);
        $users = $userControl->GetAllUsers();

        $userIndex = (int) $_GET['userIndex'];
        $indexToRemove  = -1;
        for ($i=0;$i<count($users);$i++)
        {
            if($users[$i]->GetId() == $loggedInUser->GetId())
            {
                $indexToRemove = $i;
            }
        }
        unset($users[$indexToRemove]);
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
        <input type="checkbox" id="cbIsAdmin" name="isAdmin" value="checked">
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