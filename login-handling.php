<?php include 'Classes.php'; ?>   

<?php

$control = new Control();
$control->addUser("Nick", "Doe", new DateTime('01/11/2000'), "nick.doe00@gmail.com", "pass123");
$control->addUser("John", "Newman", new DateTime('05/12/2005'), "johnxD@gmail.com", "pass321");

// function test_input($data) {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $email = test_input($_POST["email"]);
//     $password = test_input($_POST["password"]);
// }

$email = $_POST["email"];
$password = $_POST["password"];

$control->getAllUsers();
function CheckCredentials($email, $password){
    foreach ($control->getAllUsers() as $user) 
    {
        if($email == $user->getEmail() && $password == $user->getPassword())
        {
            return $user;   
        }
    }

    return -1;
}  



$user = CheckCredentials($email, $password);


// if ($_SERVER["REQUEST_METHOD"] == "POST") 
// {
//     if(CheckCredentials($email, $password) != -1)
//     {
//         $action = "succesLogin.php"; 
//     }
//     else
//     {
//         $action ="";
//     }
// }

?>