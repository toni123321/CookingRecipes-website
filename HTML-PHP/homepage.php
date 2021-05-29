<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes website</title>
    <?php include '../HTML-PHP/stylesheetScripts.php';?>

</head>
<body>
    <?php include '../HTML-PHP/main.php';?>
    <script src="../JavaScript/removeSearchBar.js"></script>

    <?php
        if(isset($_SESSION['msg-delete-recipe']))
        {
            echo '<h2 class="msg">'. $_SESSION['msg-delete-recipe'] .'</h2>';
            unset($_SESSION['msg-delete-recipe']);
        }
        else if(isset($_SESSION['delete-account-msg']))
        {
            echo '<h2 class="msg">'. $_SESSION['delete-account-msg'] .'</h2>';
            unset($_SESSION['delete-account-msg']);
        }
    ?>

    <div class="grid" id="test">
    <?php
    $control = new RecipeControl();
    //$control->AddRecipe("Pancakes with chocolate", 250, CuisineType::AMERICAN, 0.30, DifficultyLevel::MEDIUM, "Some text 1!");
    //$control->AddRecipe("Risotto", 100, CuisineType::ITALIAN, 1.00, DifficultyLevel::MEDIUM, "Some text 2!");
    $dbControl = new RecipeDbControl("studmysql01.fhict.local", "dbi454917", "dbi454917", "123");
    $dbControl->GetRecipes($control);

    $randomRecipes = $control->GetAllRecipes();
    shuffle($randomRecipes);

    $loopCounter = 0;

    foreach($randomRecipes as $recipe)
    {
            if($loopCounter >= 3){
                break;
            }
            else {
                ?>
                <a class="recipe-item" href="<?php echo '../HTML-PHP/currentRecipe.php?recipeId='. $recipe->GetId();?>">

                <?php
                echo'
                  <div class="recipe">';?>
                    <img id="recipeImg" width="250" height="225" src="<?php echo $recipe->GetImage(); ?>" alt="">
                    <?php
                    echo '
                    <div class="recipeInfo" id="title">' . $recipe->GetTitle() . '</div>
                    <div class="recipeInfo" id="duration">Duration: ' . $recipe->GetDuration() . '</div>
                    <div class="recipeInfo" id="difficulty">Difficulty ' . $recipe->GetDifficulty() . '</div>
                  </div>
                </a>
              ';
            }
            $loopCounter++;
    }
    ?>
    </div>

    <button class="moreRecipesButton" onclick="location.href='../HTML-PHP/recipesPage.php'" type="button">Discover more recipes</button>

</body>

</html>