<?php include '../DataLayer/UserDbControl.php'; ?>
<?php
    if(isset($_GET['userId']) && isset($_GET['recipeId'])) {
        $userId = (int)$_GET['userId'];
        $recipeId = (int)$_GET['recipeId'];
        $isRecipeSavedToFavList = (string)($_GET['isRecipeSavedToFavList']);
        $dbControl = new UserDbControl();
        echo $isRecipeSavedToFavList;
        if($isRecipeSavedToFavList == 'false') {
            $dbControl->InsertRecipeToFavourites($userId, $recipeId);
        }
        else{
            $dbControl->DeleteRecipeFromFavourites($userId, $recipeId);
        }
    }
?>
