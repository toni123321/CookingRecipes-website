<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe website</title>
    <!-- for the icons (searchBar) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/main-styles.css">
</head>
<body>
    <?php include '../HTML-PHP/main.php';?>
    <?php include '../DataLayer/RecipeDbControl.php'; ?>


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
                echo'
                <div class="recipe">
                    <img id="recipeImg" src="../Images/avatarLogin.png" alt="">
                    <div class="recipeInfo" id="title">' . $recipe->GetTitle() . '</div>
                    <div class="recipeInfo" id="duration">Duration: ' . $recipe->GetDuration() . '</div>
                    <div class="recipeInfo" id="difficulty">Difficulty ' . $recipe->GetDifficulty() . '</div>
                </div>
            </a>
            ';


        }
        ?>
    </div>
</body>
</html>