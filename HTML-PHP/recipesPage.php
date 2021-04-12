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
        $dbControl = new RecipeDbControl();
        $dbControl->GetRecipes($control);

        $allRecipes = $control->GetAllRecipes();


        foreach($allRecipes as $recipe)
        {
            echo '
            <div class="recipe">
            <img id="recipeImg" src="../Images/avatarLogin.png" alt="">
            <div class="recipeInfo" id="title"><span>' . $recipe->GetTitle() . '</span></div>
            <div class="recipeInfo" id="duration">Duration: ' . $recipe->GetDuration() . '</div>
            <div class="recipeInfo" id="difficulty">Difficulty ' . $recipe->GetDifficulty() . '</div>
            </div>
            ';

        }
        ?>
    </div>
</body>
</html>