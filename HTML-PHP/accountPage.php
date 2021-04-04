<?php
session_start();
if(isset($_SESSION['loggedUser'])) {?>
    <?php include '../Classes/UserControl.php';?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recipe website</title>
        <link rel="stylesheet" href="../CSS/homepage-styles.css">
        <!-- for the icons (searchBar) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    <?php include '../HTML-PHP/main.php';?>
    <?php
        $user = unserialize($_SESSION['loggedUser']);
        echo $user->GetFName();
    ?>

    </body>
    </html>
<?php
}
else{
    echo 'First log in';
}
?>