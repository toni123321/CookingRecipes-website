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
    <?php include '../Classes/DbControl.php'; ?>
    
    <?php 
        $control = new Control();
        //$control->AddRecipe("Pancakes with chocolate", 250, CuisineType::AMERICAN, 0.30, DifficultyLevel::MEDIUM, "Some text 1!");
        //$control->AddRecipe("Risotto", 100, CuisineType::ITALIAN, 1.00, DifficultyLevel::MEDIUM, "Some text 2!");
        $dbControl = new DbControl();
        $dbControl->GetRecipes($control);

        echo '<h2>Recipes</h2>';
        echo '<ol class="recipes">';
        
        foreach($control->getAllRecipes() as $recipe)
        {
            //echo "<div>'. $recipe->getTitle() . $recipe->getDuration() .'</div>";
            //echo $recipe->getTitle(). "<br>" . $recipe->getCalories(). "<br>" . $recipe->getCuisine(). "<br>"  . $recipe->getDuration(). "<br>"  . $recipe->getDifficulty(). "<br>" . $recipe->getInstructions(). "<br>";
            
            echo "<li>Recipe id: {$recipe->GetId()} <br> title: {$recipe->GetTitle()} <br> Calories: {$recipe->GetCalories()} <br> Cuisine type: {$recipe->GetCuisine()} <br> Duration: {$recipe->GetDuration()} <br> Difficulty: {$recipe->GetDifficulty()} <br> Instructions: {$recipe->GetInstructions()} </li> <br>";
        }
        echo "</ol>";
    ?>
</body>
</html>