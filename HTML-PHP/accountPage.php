<link rel="stylesheet" href="../CSS/main-styles.css">
<link rel="stylesheet" href="../CSS/editAccountDetails.css">
<?php
session_start();
if(isset($_SESSION['loggedUser'])) {?>
    <?php include '../LogicLayer/UserControl.php';?>
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
        ?>
        <form id="editAccForm" action="../Handling/editAccount-handling.php" method="post">
            <label for="fName" class="editAccLabel">First name:</label><br>
            <input type="text" class="editAccTextField" class="editAccForm" id="fName" name="fName" value="<?php echo $loggedInUser->GetFName()?>"<br><br>
            <label for="lName" class="editAccLabel">Last name:</label><br>
            <input type="text" class="editAccTextField" class="editAccForm" id="lName" name="lName" value="<?php echo $loggedInUser->GetLName()?>"<br><br>
            <label for="email" class="editAccLabel">Email:</label><br>
            <input type="text" class="editAccTextField" class="editAccForm"  id="email" name="email" value="<?php echo $loggedInUser->GetEmail()?>"<br><br>
            <label for="newPassword" class="editAccLabel">New password:</label><br>
            <input type="text" class="editAccTextField" class="editAccForm"  id="newPassword" name="newPassword"?><br><br>
            <label for="confNewPassword" class="editAccLabel">Confirm new password:</label><br>
            <input type="text" class="editAccTextField" class="editAccForm"  id="confNewPassword" name="confNewPassword"?><br><br>
            <label for="currPassword" class="editAccLabel">Current password:</label><br>
            <input type="text" class="editAccTextField" class="editAccForm"  id="currPassword" name="currPassword"?><br><br>
            <input class="saveChangesButton" type="submit" value="Save changes">
        </form>
        </body>
        </html>
<?php
}
else{
    echo '<label id="notLoggedIn">In order to changes your account details, please, make sure to login first.</label><br>';
}
?>