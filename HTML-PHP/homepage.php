<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe website</title>
    <link rel="stylesheet" href="../CSS/homepage-styles.css">
    <!-- for the icons (searchBar) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include '../HTML-PHP/main.php';?>
    <?php include '../DataLayer/RecipeDbControl.php'; ?>



    <div class="grid">
    <?php
    $control = new RecipeControl();
    //$control->AddRecipe("Pancakes with chocolate", 250, CuisineType::AMERICAN, 0.30, DifficultyLevel::MEDIUM, "Some text 1!");
    //$control->AddRecipe("Risotto", 100, CuisineType::ITALIAN, 1.00, DifficultyLevel::MEDIUM, "Some text 2!");
    $dbControl = new RecipeDbControl();
    $dbControl->GetRecipes($control);

    $randomRecipes = $control->GetAllRecipes();
    shuffle($randomRecipes);
    $recipe1ID = $randomRecipes[0]->GetId();
    $recipe2ID = $randomRecipes[1]->GetId();
    $recipe3ID = $randomRecipes[2]->GetId();

    $loopCounter = 0;

    foreach($randomRecipes as $recipe)
    {
            if($loopCounter >= 3){
                break;
            }
            else {
                echo
                    '
              <div class="recipe">
                <img id="recipeImg" src="../Images/avatarLogin.png" alt="">
                <div class="recipeInfo" id="title"><span>' . $recipe->GetTitle() . '</span></div>
                <div class="recipeInfo" id="duration">Duration: ' . $recipe->GetDuration() . '</div>
                <div class="recipeInfo" id="difficulty">Difficulty ' . $recipe->GetDifficulty() . '</div>
              </div>
              ';
            }
            $loopCounter++;
    }
    ?>
    </div>

    <button class="moreRecipesButton" onclick="location.href='../HTML-PHP/recipesPage.php'" type="button">Discover more recipes</button>
</body>

</html>