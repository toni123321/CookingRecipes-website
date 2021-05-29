<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Current recipe</title>
    <?php include '../HTML-PHP/stylesheetScripts.php';?>
    <link rel="stylesheet" href="../CSS/currentRecipe-styles.css">

</head>
<body>
    <?php include '../HTML-PHP/main.php'; ?>
    <script src="../JavaScript/removeSearchBar.js"></script>

    <?php
        $recipeId = (int)$_GET['recipeId'];
        $control = new RecipeControl();
        $dbControl = new RecipeDbControl("studmysql01.fhict.local", "dbi454917", "dbi454917", "123");
        $dbControl->GetRecipes($control);
//        $dbControl->GetRecipeIngredients($control);
        $currRecipe = $control->GetRecipe($recipeId);
        $ingredients = $currRecipe->GetAllIngredients();
    ?>
    <?php
    $userId = null;
    $user = null;
    $isRecipeSavedToFavList = false;
    if(isset($_SESSION['loggedUser'])) {
        $user = unserialize($_SESSION['loggedUser']);
        $userId = $user->GetId();



        $userControl = new UserControl();
        $recipeControl = new RecipeControl();

        $userDBControl = new UserDbControl("studmysql01.fhict.local", "dbi454917", "dbi454917", "123");
        $recipeDBControl = new RecipeDbControl("studmysql01.fhict.local", "dbi454917", "dbi454917", "123");
        $userDBControl->GetUsers($userControl);
        $recipeDBControl->GetRecipes($recipeControl);
        //$recipeDBControl->GetRecipeIngredients($recipeControl);


        $userDBControl->GetUserFavRecipes($recipeControl, $user);
        $favRecipes = $user->GetFavRecipes();
        foreach ($favRecipes as $recipe) {
            if ($recipe->GetId() == $recipeId) {
                $isRecipeSavedToFavList = true;
                break;
            }
        }

        if($user->GetIsAdmin())
        {
            echo '
                <div class="adminControls">
                    <button class="editButton"><i class="far fa-edit"></i></button>
                    <button class="deleteButton"><i class="fas fa-trash"></i></button>
                </div>
            ';
        }
    }
    ?>

    <?php
    echo '
        
        <div class="currRecipe">
            <div class="upper">
                <div class="recipeInfo" id="title">' . $currRecipe->GetTitle() . '</div>                
                <button class="saveRecipeToFavList"><i class="fa fa-heart-o"></i></button>
                
            </div>
            <div class="middle">';?>
                <img id="recipeImg" src="<?php echo $currRecipe->GetImage(); ?>" alt="">
                <?php
                echo '
                <div class="ingredients">
                    <h3>Ingredients</h3>
                    <ul>';
    ?>
                        <?php
                            foreach($ingredients as $ingredient)
                            {
                                echo "<li>{$ingredient}";
                            }
                        ?>
    <?php
    echo'
                    </ul>
                    
                </div>
            </div>
            <div class="recipe-info">
                <div class="summary">
                    <div class="summary-content">
                        <div class="basic-info">
                            <div id="servings"><i class="icon-food"></i> ' . $currRecipe->GetServings() . ' servings</div>
                            <div id="duration"><i class="fa fa-clock-o"></i> ' . $currRecipe->GetDuration() . '</div>
                        </div>
                        <div class="additional-info">
                            <div id="cuisine">Cuisine: ' . $currRecipe->GetCuisine() . '</div>
                            <div id="difficulty">Difficulty: ' . $currRecipe->GetDifficulty() . '</div>
                            <div id="calories">Calories: ' . $currRecipe->GetCalories() . '</div>
                        </div>
                    </div>
                </div>
                <div class="instructions">
                    <h3>Cooking instructions</h3>
                    <p>' . $currRecipe->GetInstructions() . '</p>
                </div>
                
            </div>
        </div>
    ';
    ?>
    <?php




    ?>
    <script type="text/javascript">

        var recipeId = <?php echo json_encode($recipeId); ?>;
        var userId = <?php echo json_encode($userId); ?>;
        var isRecipeSavedToFavList = <?php echo json_encode($isRecipeSavedToFavList); ?>;
    </script>
    <script src="../JavaScript/saveRecipeToFavList.js"></script>
    <script src="../JavaScript/removeRecipe.js"></script>
    <script src="../JavaScript/editRecipe.js"></script>

</body>
</html>