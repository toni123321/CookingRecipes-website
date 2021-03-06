<?php include_once('../DataLayer/DbControl.php');?>
<?php include '../LogicLayer/UserControl.php'; ?>

<?php
class UserDbControl extends DbControl {

    public function __construct($host, $dbName, $username, $password)
    {
        parent::__construct($host, $dbName, $username, $password);
    }

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

            $control->RemoveAllUsers();

            foreach ($result as $row)
            {
                $id = $row['ID'];
                $fname = $row['FirstName'];
                $lname = $row['LastName'];
                $email = $row['Email'];
                $password = $row['Password'];
                $isAdmin = $row['isAdmin'];

                $control->AddUser($id, $fname, $lname, $email, $password, $isAdmin);

            }
            // Close DB connection
            $this->conn = null;


        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function InsertRecipeToFavourites($userId, $recipeId)
    {
        try {

            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username,  $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO user_favourite_recipe(UserID, FavRecipeID) " .
                    "VALUES(?, ?)";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$userId, $recipeId]);

            // Close DB connection
            $this->conn = null;


        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function DeleteRecipeFromFavourites($userId, $recipeId)
    {
        try {

            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username,  $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "DELETE from user_favourite_recipe " .
                "where UserID=? and FavRecipeID=?";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$userId, $recipeId]);

            // Close DB connection
            $this->conn = null;


        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function GetUserFavRecipes(RecipeControl $control,  $user)
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT FavRecipeID from user_favourite_recipe as ufr " .
                    "where ufr.UserID = ?";
//
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$user->GetId()]);

            $result = $stmt->fetchAll();

            foreach ($result as $row) {
                $recipeId = $row['FavRecipeID'];

                $recipe = $control->GetRecipe($recipeId);
                $user->SaveRecipeToFavourites($recipe);
            }
            // Close DB connection
            $this->conn = null;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function UpdateUser($user){
        try {

            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username,  $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE user SET FirstName= ?, LastName = ?, Email = ?, Password = ?, isAdmin = ? WHERE ID = ?";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([$user->GetFName(), $user->GetLName(), $user->GetEmail(), $user->GetPassword(), (int)$user->GetIsAdmin(), $user->GetId()]);

            $this->conn = null;

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function RemoveUser($id){
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username,  $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "DELETE from user where ID = ?";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);

            $this->conn = null;

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

}


?>