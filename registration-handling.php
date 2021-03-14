
<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function printInput()
    {
        return "Hello";
    }
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = test_input($_POST["firstname"]);
        $lname = test_input($_POST["lastname"]);
        $dateOfBirth = test_input($_POST["dateOfBirth"]);
        $email = test_input($_POST["email"]);
        $password = test_input($_POST["password"]);
    }

    // define variables and set to empty values
    $fnameErr = $lnameErr = $dateOfBirthErr = $emailErr = $passwordErr =  "";
    $fname = $lname = $email = $dateOfBirth = $password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (empty($_POST["firstname"])) {
            $fnameErr = "First name is required";
        } else {
            $fname = test_input($_POST["firstname"]);
        }

        if (empty($_POST["lastname"])) {
            $lnameErr = "Last name is required";
        } else {
            $lname = test_input($_POST["lastname"]);
        }

        if (empty($_POST["dateOfBirth"])) {
            $dateOfBirthErr = "Date of birth is required";
        } else {
            $dateOfBirth = test_input($_POST["dateOfBirth"]);
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
        }

        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else {
            $password = test_input($_POST["password"]);
        }
    }
?>
