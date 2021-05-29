<?php include_once('../DataLayer/DbControl.php');?>
<?php include '../LogicLayer/RecipeControl.php'; ?>

<?php
class RecipeDbControl extends DbControl {

    public function __construct($host, $dbName, $username, $password)
    {
        parent::__construct($host, $dbName, $username, $password);
    }

    public function InsertRecipe($image, $title, $calories, $cuisine, $duration, $difficulty, $servings, $ingredients, $instructions){
        try {

            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username,  $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO recipe(Image, Title, Calories, Cuisine, Duration, Difficulty, Servings, Ingredients, Instructions) 
                    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$image, $title, $calories, $cuisine, $duration, $difficulty, $servings, $ingredients , $instructions]);

            // Close DB connection
            $this->conn = null;
            return "Successfully created recipe!";

        } catch(PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function UpdateRecipe($image, $title, $calories, $cuisine, $duration, $difficulty, $servings, $ingredients, $instructions, $recipeID){
        try {

            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username,  $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE recipe SET Image = ?, Title = ?, Calories = ?, Cuisine = ?, Duration = ?, Difficulty = ?, Servings = ?, Ingredients = ?, Instructions = ? ".
                    "WHERE ID = ?";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$image, $title, $calories, $cuisine, $duration, $difficulty, $servings, $ingredients , $instructions, $recipeID]);

            // Close DB connection
            $this->conn = null;
            return "Successfully updated recipe!";

        } catch(PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function GetRecipes(RecipeControl $control){
        try {

            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username,  $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM recipe";

            $result = $this->conn->query($sql);


            foreach ($result as $row)
            {
                $id = $row['ID'];
                $image = $row['Image'];
                $title = $row['Title'];
                $calories = $row['Calories'];
                $cuisine = $row['Cuisine'];
                $duration = $row['Duration'];
                $difficulty = $row['Difficulty'];
                $servings = $row['Servings'];
                $ingredients = $row['Ingredients'];
                $instructions = $row['Instructions'];
                $control->AddRecipe($id, $image, $title, $calories, $cuisine, $duration, $difficulty, $servings, $ingredients, $instructions);
            }

            // Close DB connection
            $this->conn = null;


        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function RemoveRecipe($recipeId)
    {
        try {

            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username,  $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "DELETE from recipe " .
                "where ID=?";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$recipeId]);

            $this->conn = null;


        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>
