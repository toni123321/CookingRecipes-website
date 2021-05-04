
<!-- Recipe class -->
<?php include 'Ingredient.php'; ?>
<?php include '../Models/Enums/DifficultyLevel.php'; ?>
<?php include '../Models/Enums/CuisineType.php'; ?>

<?php
class Recipe{

    //variables


    //public static $idCounter = 1000;
    private $id;
    private $title;
    private $calories;
    private $cuisine;
    private $duration;
    private $difficulty;
    private $instructions;
    private $ingredients = array();
    private $servings;

    //constructor
    public function __construct($id, $title, $calories, $cuisine, $duration, $difficulty, $servings, $ingredients , $instructions){
        $this->id = $id;
        $this->title = $title;
        $this->calories = $calories;
        $this->cuisine = $cuisine;
        $this->duration = $duration;
        $this->difficulty = $difficulty;
        $this->servings = $servings;
        $this->instructions = $instructions;
        $this->AddIngredient($ingredients);
    }

    //setters
    public function SetId($id){
        $this->id = $id;
    }

    public function SetTitle($title){
        $this->title = $title;
    }

    public function SetCalories($calories){
        $this->calories = $calories;
    }

    public function SetCuisine($cuisine){
        $this->cuisine = $cuisine;
    }

    public function SetDuration($duration){
        $this->duration = $duration;
    }

    public function SetDifficulty($difficulty){
        $this->difficulty = $difficulty;
    }

    public function SetServings($servings) {
        $this->servings = $servings;
    }

    public function SetInstructions($instructions){
        $this->instructions = $instructions;
    }

    //getters
    public function GetId(){
        return $this->id;
    }

    public function GetTitle(){
        return $this->title;
    }

    public function GetCalories(){
        return $this->calories;
    }

    public function GetCuisine(){
        return $this->cuisine;
    }

    public function GetDuration(){
        return $this->duration;
    }

    public function GetDifficulty(){
        return $this->difficulty;
    }

    public function GetServings() {
        return $this->servings;
    }

    public function GetInstructions(){
        return $this->instructions;
    }

    //array methods
    public function AddIngredient($ingredientsAsText){
        foreach(explode("\n", $ingredientsAsText) as $line) {
            $this->ingredients[] = $line;
        }
    }

//    public function RemoveIngredient($id){
//        //unset( $ingredients[array_search( 'te', $ingredients )] );
//
//        foreach($this->ingredients as $ingredient) {
//            if($ingredient->id == $id){
//                // to-do delete
//            }
//        }
//    }

    public function GetAllIngredients(){
        return $this->ingredients;
    }
}
?>