
<!-- Control class -->
<?php include '../Classes/Control.php'; ?>

<?php
class DbControl{
    private $conn;

    // Server=studmysql01.fhict.local;Uid=dbi454917;Database=dbi454917;Pwd=yourPassword;
//    private $host = "studmysql01.fhict.local";
//    private $dbName = "dbi454917";
//    private $username = "dbi454917";
//    private $password = "123";

    private $host = "localhost";
    private $dbName = "dbi454917";
    private $username = "root";
    private $password = "";

    public function InsertUser($fname, $lname, $dob, $email, $password){
        try {

            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username,  $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO user(FirstName, LastName, DateOfBirth, Email, Password) 
                    VALUES(?, ?, ?, ?, ?)";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$fname, $lname, $dob, $email, $password]);
            echo 'You have successfully inserted new employee!';


//            $control = new Control();
//            $control->AddUser($id, $fname, $lname, $dob, $email, $password);


            // Close DB connection
            $this->conn = null;

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function GetUsers(Control $control){
        try {

            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username,  $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM user";

            $result = $this->conn->query($sql);


            foreach ($result as $row)
            {
                $id = $row['ID'];
                $fname = $row['FirstName'];
                $lname = $row['LastName'];
                $dob = $row['DateOfBirth'];
                $email = $row['Email'];
                $password = $row['Password'];

                $control->AddUser($id, $fname, $lname, $dob, $email, $password);

            }
            // Close DB connection
            $this->conn = null;


        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function InsertRecipe(){

    }

    public function GetRecipes(Control $control){
        try {

            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username,  $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM recipe";

            $result = $this->conn->query($sql);


            foreach ($result as $row)
            {
                $id = $row['ID'];
                $title = $row['Title'];
                $calories = $row['Calories'];
                $cuisine = $row['Cuisine'];
                $duration = $row['Duration'];
                $difficulty = $row['Difficulty'];
                $instructions = $row['Instructions'];
                $ingredientId = $row['IngredientID'];

                $control->AddRecipe($id, $title, $calories, $cuisine, $duration, $difficulty, $instructions, $ingredientId);

            }
            // Close DB connection
            $this->conn = null;


        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

}

?>