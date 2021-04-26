
<!-- Control class -->
<?php include '../Models/Recipe.php'; ?>

<?php
class RecipeControl{
    private $recipes = array();

    //recipes
    public function AddRecipe($id, $title, $calories, $cuisine, $duration, $difficulty, $instructions){
        $recipe = new Recipe($id, $title, $calories, $cuisine, $duration, $difficulty, $instructions);
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
