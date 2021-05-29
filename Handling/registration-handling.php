<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/register-styles.css">
    <title>Success registration</title>
</head>
<body>
    <?php include '../DataLayer/UserDbControl.php'; ?>
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
            $email = test_input($_POST["email"]);
            $password = test_input($_POST["password"]);

            $dbControl = new UserDbControl("studmysql01.fhict.local", "dbi454917", "dbi454917", "123");
            $dbControl->InsertUser($fname, $lname, $email, $password);
            echo
            '
                <div id="parent-successful_registration">
                    <div id="successful_registration">
                    
                ';
                        echo '<h2>Welcome, ' . $fname . '</h2>';
                echo '
                        <p>You have registered successfully!</p>
                        
                        <button class="goToHomePage" onclick="location.href=\'../HTML-PHP/homepage.php\'" type="button">Go to home page</button>
                        <button class="goToLoginPage" onclick="location.href=\'../HTML-PHP/login.php\'" type="button">Log in</button>
                        
                    </div>
                </div>
                ';
        }

    ?>
</body>
</html>