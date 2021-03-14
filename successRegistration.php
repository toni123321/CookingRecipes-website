<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success registration</title>
</head>
<body>
    <?php include 'registration-handling.php';?>
    Welcome <?php echo $fname ?><br>
    <?php
        echo $lname . "<br>" .  $email . "<br>" . $dateOfBirth
    ?>
</body>
</html>