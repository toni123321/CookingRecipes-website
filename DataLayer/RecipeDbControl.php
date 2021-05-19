
<?php include '../LogicLayer/RecipeControl.php'; ?>

<?php
class RecipeDbControl{
    private $conn;

    // Server=studmysql01.fhict.local;Uid=dbi454917;Database=dbi454917;Pwd=yourPassword;
    private $host = "studmysql01.fhict.local";
    private $dbName = "dbi454917";
    private $username = "dbi454917";
    private $password = "123";

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

//    public function GetRecipeIngredients(RecipeControl $control)
//    {
//        try {
//            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username, $this->password);
//            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//            $sql = "SELECT ri.RecipeID, ri.IngredientID, i.Name, i.Quantity " .
//                "FROM recipe_ingredient as ri " .
//                "inner join ingredient as i " .
//                "on i.ID = ri.IngredientID";
////            $sql = "SELECT ri.RecipeID, ri.IngredientID, i.Name, i.Quantity FROM recipe-ingredients as ri inner join ingredient as i on i.IngredientID = ri.IngredientID";
//
//            $result = $this->conn->query($sql);
//
//
//            foreach ($result as $row) {
//                $recipeId = $row['RecipeID'];
//                $ingredientId = $row['IngredientID'];
//                $currIngredientName = $row['Name'];
//                $currIngredientQuantity = $row['Quantity'];
//                $control->GetRecipe($recipeId)->AddIngredient($ingredientId, $currIngredientName, $currIngredientQuantity);
//
//            }
//            // Close DB connection
//            $this->conn = null;
//        }
//        catch(PDOException $e) {
//            echo $e->getMessage();
//        }
//    }
}
?>
