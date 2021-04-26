<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginForm</title>
    <link rel="stylesheet" href="../CSS/register-styles.css">
</head>
<body>
    <button class="goToHomePage" onclick="location.href='../HTML-PHP/homepage.php'" type="button">Go to home page</button>
    <div class="form-parent">

        <form action="../Handling/registration-handling.php" method="post">
        
            <fieldset>
                <legend>Register</legend>
                <div class="avatar">
                    <img src="../Images/avatarRegister.png" alt="Avatar" class="avatar" width="200" height="200">
                </div>
                <div class="form">
                    <label for="fname"><b>First name</b></label>
                    <input type="text" placeholder="Enter first name" name="firstname" required>
                    
                    <label for="lname"><b>Last name</b></label>
                    <input type="text" placeholder="Enter last name" name="lastname" required>

                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter email" name="email" required>

                    <label for="password"><b>Password</b></label>
                    <input type="password" placeholder="Enter password" name="password" required>
                        
                    <button id="registerBtn" type="submit">Register</button>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>