<?php include '../DataLayer/RecipeDbControl.php';?>

<?php
if(isset($_GET['offset']) && isset($_GET['limit'])){

    $offset = $_GET['offset'];
    $limit = $_GET['limit'];
    $recipeDbControl = new RecipeDbControl("studmysql01.fhict.local", "dbi454917", "dbi454917", "123");
    $recipeControl = new RecipeControl();

    $recipeDbControl->GetRecipesOnScroll($recipeControl, $limit, $offset);
    //$recipeDbControl->GetRecipes($recipeControl);
    $recipes = $recipeControl->GetAllRecipes();
    //echo count($recipes);
    echo print_r($recipes);
    /*while($row = $recipes->fetch(PDO::FETCH_BOTH)){

    }*/
}
?>
