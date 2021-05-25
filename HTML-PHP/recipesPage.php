<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes</title>
    <?php include '../HTML-PHP/stylesheetScripts.php';?>
</head>
<body>
    <?php include '../HTML-PHP/main.php';?>
    <div class="create-recipe-btn">
        <button onclick="location.href='recipe-CreateEdit.php'">>> Create new recipe</button>
    </div>

    <div id="search">
        <input id="searchInput" type="text" placeholder="Search.." name="search">
        <button id="searchBtn" type="submit"><i class="fa fa-search"></i></button>
    </div>
    <div class="grid">
        <?php
        $control = new RecipeControl();
        $dbControl = new RecipeDbControl();
        $dbControl->GetRecipes($control);

        $allRecipes = $control->GetAllRecipes();


        foreach($allRecipes as $recipe)
        {
            ?>
            <a class="recipe-item" href="<?php echo '../HTML-PHP/currentRecipe.php?recipeId='. $recipe->GetId();?>">

             <?php
                echo '
                <div class="recipe">';
                ?>
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
        ?>
    </div>
    <script src="../JavaScript/searchRecipes.js"></script>
</body>
</html>