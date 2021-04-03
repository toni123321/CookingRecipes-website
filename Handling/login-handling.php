<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
<body>
    <!-- Include php classes -->
    <?php include '../Classes/DbControl.php'; ?>

    <?php
        // Make a new object of type Control
        $control = new Control();
        //$control->AddUser("Nick", "Doe", new DateTime('01/11/2000'), "nick.doe00@gmail.com", "pass123");
        //$control->AddUser("John", "Newman", new DateTime('05/12/2005'), "johnxD@gmail.com", "pass321");
        $dbControl = new DbControl();
        $dbControl->GetUsers($control);

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $email = test_input($_POST["email"]);
            $password = test_input($_POST["password"]);

            function CheckCredentials($email, $password){
                global $control;
                foreach ($control->GetAllUsers() as $user)
                {
                    if($email == $user->GetEmail() && $password == $user->GetPassword()){
                        return $user;
                    }
                }
                return null;
            }
            if(CheckCredentials($email, $password) != null)
            {
                session_start();
                $currUser = CheckCredentials($email, $password);
                $_SESSION['loggedUser'] = serialize($currUser);

                header("Location:accountPage.php");
                exit;
            }
            else{
                echo "Invalid credentials supplied!";
            }
        }
    ?>
</body>
</html>

