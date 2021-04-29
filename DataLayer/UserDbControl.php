
<!-- UserControl class -->
<?php include '../LogicLayer/UserControl.php'; ?>

<?php
class UserDbControl{
    private $conn;

    // Server=studmysql01.fhict.local;Uid=dbi454917;Database=dbi454917;Pwd=yourPassword;
    private $host = "studmysql01.fhict.local";
    private $dbName = "dbi454917";
    private $username = "dbi454917";
    private $password = "123";

//    private $host = "localhost";
//    private $dbName = "dbi454917";
//    private $username = "root";
//    private $password = "";

    public function InsertUser($fname, $lname, $email, $password){
        try {

            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username,  $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO user(FirstName, LastName, Email, Password) 
                    VALUES(?, ?, ?, ?)";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$fname, $lname, $email, $password]);
//            echo 'You have successfully inserted new employee!';


//            $control = new UserControl();
//            $control->AddUser($id, $fname, $lname, $dob, $email, $password);


            // Close DB connection
            $this->conn = null;

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function GetUsers(UserControl $control){
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
                $email = $row['Email'];
                $password = $row['Password'];

                $control->AddUser($id, $fname, $lname, $email, $password);

            }
            // Close DB connection
            $this->conn = null;


        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function UpdateUser($id, $fname, $lname, $email){
        try {

            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username,  $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE user SET FirstName= ?, LastName = ?, Email = ? WHERE ID = ?";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$fname, $lname, $email, $id]);

            $this->conn = null;

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

}

?>