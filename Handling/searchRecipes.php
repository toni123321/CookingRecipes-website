    <?php include '../DataLayer/RecipeDbControl.php'?>
<?php
if(isset($_GET['searchInput']))
{
    $searchInput = (string) $_GET['searchInput'];

    $recipesDbControl = new RecipeDbControl("studmysql01.fhict.local", "dbi454917", "dbi454917", "123");
    $recipeControl = new RecipeControl();
    $recipesDbControl->GetRecipes($recipeControl);

    foreach($recipeControl->GetAllRecipes() as $recipe)
    {
        if($recipe->GetTitle() == $searchInput)
        {
            ?>
            <a class="recipe-item" href="<?php echo '../HTML-PHP/currentRecipe.php?recipeId='. $recipe->GetId();?>">

            <?php
            echo'
                <div class="recipe"> ';?>
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
    }


}
?>
