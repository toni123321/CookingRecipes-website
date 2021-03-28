<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success registration</title>
</head>
<body>
    <?php include '../Classes/DbControl.php'; ?>
    <?php
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fname = test_input($_POST["firstname"]);
            $lname = test_input($_POST["lastname"]);
            $dateOfBirth = test_input($_POST["dateOfBirth"]);
            $email = test_input($_POST["email"]);
            $password = test_input($_POST["password"]);

            $dbControl = new DbControl();
            $dbControl->InsertUser($fname, $lname, $dateOfBirth, $email, $password);

            echo "Welcome, " . $fname . "<br>";
            echo "You have registered successfully!" . "<br>";
            echo '<a href="http://localhost/s2-wad/HTML-PHP/login.php">Go to login page</a>';
        }
        
    ?>
</body>
</html>