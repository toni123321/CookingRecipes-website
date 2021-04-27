<?php include 'recipeDbControl.php';?>

<?php

if(isset($_GET['offset']) && isset($_GET['limit'])){

    $offset = $_GET['offset'];
    $limit = $_GET['limit'];

    $control = new RecipeControl();
    $dbControl = new RecipeDbControl();
    $allRecipes = $control->GetAllRecipes();
    shuffle($allRecipes);

    foreach ($allRecipes as $recipe){
        echo '<div class = "recipePreview">';
        echo '<div id="pic"></div>';
        echo '<div id="title">'.$recipe->GetTitle().'</div>';
        echo '<div id="duration">Duration: '.$recipe->GetDuration().'</div>';
        echo '<div id="difficulty">Difficulty '.$recipe->GetDifficulty().'</div>';
        echo '</div>';
    }
}
?>