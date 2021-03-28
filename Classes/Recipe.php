
<!-- Recipe class -->
<?php include 'Ingredient.php'; ?>
<?php include 'DifficultyLevel.php'; ?>
<?php include 'CuisineType.php'; ?>

<?php
class Recipe{

    //variables
    private $ingredients = array();

    public static $idCounter = 1000;
    private $id;
    private $title;
    private $calories;
    private $cuisine;
    private $duration;
    private $difficulty;
    private $instructions;

    //constructor
    public function __construct($title, $calories, $cuisine, $duration, $difficulty, $instructions){
        $this->title = $title;
        $this->calories = $calories;
        $this->cuisine = $cuisine;
        $this->duration = $duration;
        $this->difficulty = $difficulty;
        $this->instructions = $instructions;

        //static variable need to be accessed using self
        $this->id = self::$idCounter;

        self::$idCounter++;
    }

    //setters
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

    public function SetInstructions($instructions){
        $this->instructions = $instructions;
    }

    //getters
    public function GetID(){
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
    public function GetInstructions(){
        return $this->instructions;
    }

    //array methods
    public function AddIngredient($name, $quantity){
        $ingredient = new Ingredient($name, $quantity);
        $ingredients[] = $ingredient;
    }

    public function RemoveIngredient($id){
        //unset( $ingredients[array_search( 'te', $ingredients )] );

        foreach($this->ingredients as $ingredient) {
            if($ingredient->id == $id){
                // to-do delete
            }
        }
    }

    public function GetAllIngredients(){
        array_values($this->ingredients);
    }
}
?>