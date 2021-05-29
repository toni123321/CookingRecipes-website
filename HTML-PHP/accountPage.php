<?php
session_start();
if(isset($_SESSION['loggedUser'])) {?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Account</title>
        <?php include '../HTML-PHP/stylesheetScripts.php';?>
        <link rel="stylesheet" href="../CSS/editAccountDetails.css">
    </head>
    <body>

        <?php include '../HTML-PHP/main.php';?>
        <script src="../JavaScript/removeSearchBar.js"></script>
        <?php
        if(isset($_SESSION['edit-pass-msg']))
        {
            $msg = (string) $_SESSION['edit-pass-msg'];
            echo '<h3 class="msg">' . $msg . '</h3>';
            unset($_SESSION['edit-pass-msg']);
        }
        ?>
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
            <input type="password" class="editAccTextField" class="editAccForm"  id="newPassword" name="newPassword"?><br><br>
            <label for="confNewPassword" class="editAccLabel">Confirm new password:</label><br>
            <input type="password" class="editAccTextField" class="editAccForm"  id="confNewPassword" name="confNewPassword"?><br><br>
            <label for="currPassword" class="editAccLabel">Current password:</label><br>
            <input type="password" class="editAccTextField" class="editAccForm"  id="currPassword" name="currPassword"?><br><br>
            <button class="saveChangesButton" type="submit"><i class="far fa-save"></i> Save changes</button>
        </form>
<!--        <button onclick="location.href = '../Handling/removeUserAccountByUser.php'" class="deleteAccount"><i class="fas fa-user-times"></i> Delete account</button>-->

        <div id = "dialog-delete-account" >
            Do you really want to delete your account?
        </div>

        <button class="deleteAccount" id="deleteAccount"><i class="fas fa-user-times"></i> Delete account</button>
        <script src="jquery.ui.position.js"></script>
        <script src="../JavaScript/deleteAccountConfirmDialog.js"></script>

    </body>
    </html>
<?php
}
else{
    echo '<label id="notLoggedIn">In order to changes your account details, please, make sure to login first.</label><br>';
}
?>