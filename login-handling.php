<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success login</title>
</head>
<body>
    <!-- Include php classes -->
    <?php include 'Classes.php'; ?>   

    <?php
        // Make a new object of type Control
        $control = new Control();
        $control->addUser("Nick", "Doe", new DateTime('01/11/2000'), "nick.doe00@gmail.com", "pass123");
        $control->addUser("John", "Newman", new DateTime('05/12/2005'), "johnxD@gmail.com", "pass321");
        
        
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
                foreach ($control->getAllUsers() as $user) 
                {
                    if($email == $user->getEmail() && $password == $user->getPassword()){
                        return $user;   
                    }
                }

                return null;
            }  
            if(CheckCredentials($email, $password) != null)
            {
                // echo "You successfully log in!" . "<br>";
                // $user = CheckCredentials($email, $password);
                // echo "first name: " . $user->getFName() . "<br>" . " email: " . $user->getEmail() . "<br>";
                // echo '<a href="http://localhost/s2-wad/login.php">Go to login page</a>';
                header("Location:homepage.php");
                exit;
            }
            else{
                echo "Invalid credentials supplied!";
            }
        }
    ?>
</body>
</html>

