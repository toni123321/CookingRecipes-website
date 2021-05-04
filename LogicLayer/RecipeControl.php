
<!-- Control class -->
<?php include '../Models/Recipe.php'; ?>

<?php
class RecipeControl{
    private $recipes = array();

    //recipes
    public function AddRecipe($id, $image, $title, $calories, $cuisine, $duration, $difficulty, $servings, $ingredients, $instructions){
        $recipe = new Recipe($id, $image, $title, $calories, $cuisine, $duration, $difficulty, $servings, $ingredients, $instructions);
        $this->recipes[] = $recipe;
    }

    public function RemoveRecipe($id){
        foreach($this->recipes as $recipe) {
            if($recipe->GetId() == $id){
                //todo - remove
            }
        }
    }

    public function GetAllRecipes(){
        return $this->recipes;
    }

    public function GetRecipe($id){
        foreach($this->recipes as $recipe) {
            if($recipe->GetId() == $id){
                return $recipe;
            }
        }
        return null;
    }


}

?>
