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
            $user = unserialize($_SESSION['loggedUser']);
        ?>
        <form id="editAccForm">
            <label for="fName" class="editAccLabel">First name:</label><br>
            <input type="text" class="editAccTextField" class="editAccForm" id="fName" name="fName" value="<?php echo $user->GetFName()?>"<br><br>
            <label for="lName" class="editAccLabel">Last name:</label><br>
            <input type="text" class="editAccTextField" class="editAccForm" id="lName" name="lName" value="<?php echo $user->GetLName()?>"<br><br>
            <label for="email" class="editAccLabel">Email:</label><br>
            <input type="text" class="editAccTextField" class="editAccForm"  id="email" name="email" value="<?php echo $user->GetEmail()?>"<br><br>
        </form>
        <button class="saveChangesButton" onclick="location.href='../HTML-PHP/recipesPage.php'" type="button">Save changes</button>
        </body>
        </html>
<?php
}
else{
    echo '<label id="notLoggedIn">In order to changes your account details, please, make sure to login first.</label><br>';
}
?>