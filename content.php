<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content page</title>

    <style>
        h2 {
            margin-top: 5%;
            text-align:center;
        }
        ol {
            text-align:center;
            list-style-position: inside;
        }
        
    </style>
</head>
<body>
    <?php include 'Classes.php'; ?> 
    
    <?php 
        $control = new Control();
        $control->addRecipe("Pancakes with chocolate", 250, CuisineType::AMERICAN, 0.30, DifficultyLevel::MEDIUM, "Some text 1!");
        $control->addRecipe("Risotto", 100, CuisineType::ITALIAN, 1.00, DifficultyLevel::MEDIUM, "Some text 2!");
        
        echo '<h2>Recipes</h2>';
        echo '<ol class="recipes">';
        
        foreach($control->getAllRecipes() as $recipe)
        {
            //echo "<div>'. $recipe->getTitle() . $recipe->getDuration() .'</div>";
            //echo $recipe->getTitle(). "<br>" . $recipe->getCalories(). "<br>" . $recipe->getCuisine(). "<br>"  . $recipe->getDuration(). "<br>"  . $recipe->getDifficulty(). "<br>" . $recipe->getInstructions(). "<br>";
            
            echo "<li>Recipe id: {$recipe->getId()} <br> title: {$recipe->getTitle()} <br> Calories: {$recipe->getCalories()} <br> Cuisine type: {$recipe->getCuisine()} <br> Duration: {$recipe->getDuration()} <br> Difficulty: {$recipe->getDifficulty()} <br> Instructions: {$recipe->getInstructions()} </li> <br>";
        }
        echo "</ol>";
    ?>
</body>
</html>