
<!-- Control class -->
<?php include '../Models/User.php'; ?>
<?php include '../Models/Recipe.php'; ?>

<?php
class RecipeControl{

    private $recipes = array();

    public function AddRecipe($id, $title, $calories, $cuisine, $duration, $difficulty, $instructions){
        $recipe = new Recipe($id, $title, $calories, $cuisine, $duration, $difficulty, $instructions);
        $this->recipes[] = $recipe;
    }

    public function RemoveRecipe($id){
        foreach($this->recipes as $recipe) {
            if($recipe->id == $id){
                //todo - remove
            }
        }
    }

    public function GetAllRecipes(){
        return $this->recipes;
    }

    public function GetRecipe($id){
        foreach($this->recipes as $recipe) {
            if($recipe->id == $id){
                return $recipe;
            }
        }
        return null;
    }

}

?>