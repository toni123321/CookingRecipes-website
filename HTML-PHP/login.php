<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginForm</title>
    <link rel="stylesheet" href="../CSS/loginRegister-styles.css">
</head>
<body>
    <div id="flexContainer">
        <div class="form-parent">
            <?php include '../Handling/login-handling.php'; ?>
            <form method="post">
                <fieldset>
                    <legend>Log in</legend>
                    <div class="avatar">
                        <img src="../Images/avatarLogin.png" alt="Avatar" class="avatar" width="200" height="200">
                    </div>
                    <div class="form">
                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter email" name="email" required>

                        <label for="password"><b>Password</b></label>
                        <input type="password" placeholder="Enter password" name="password" required>

                        <button type="submit">Login</button>
                        <label><input type="checkbox" checked="checked" name="remember"> Remember me</label>
                    </div>
                    <div class="form">
                        <button type="button" class="cancelbtn">Cancel</button>
                        <span class="password">Forgot <a href="#">password?</a></span>
                    </div>
                </fieldset>
            </form>


        </div>
        <div class="register">
            <h2>New to this website?</h2>
            <a href="../HTML-PHP/register.html">Click here to create an account</a>
        </div>
    </div>

</body>
</html>