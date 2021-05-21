<?php include '../DataLayer/UserDbControl.php'; ?>
<?php include '../DataLayer/RecipeDbControl.php'; ?>
<?php
if(isset($_GET['userId']) && isset($_GET['recipeId'])) {
    $userId = (int)$_GET['userId'];

    $recipeId = (int)$_GET['recipeId'];
    echo    "Id: " . $userId . '<br>';
    echo $recipeId;

    $userControl = new UserControl();
    $userDBControl = new UserDbControl();

    $userDBControl->GetUsers($userControl);

    $recipeDBControl = new RecipeDbControl();
    $recipeControl  = new RecipeControl();
    $recipeDBControl->GetRecipes($recipeControl);


    $user = $userControl->GetUser($userId);
    echo $user->GetIsAdmin();
    $currRecipe = $recipeControl->GetRecipe($recipeId);
    $recipeImgUrl = $currRecipe->GetImage();

    if($user != null && $user->GetIsAdmin() == true){
        $recipeDBControl->RemoveRecipe($recipeId);

        //deletes the image (if any)
        if (file_exists($recipeImgUrl)) {
            unlink($recipeImgUrl);
        }
        $msg = "Removed";
        session_start();
        $_SESSION['msg-delete-recipe'] = $msg;
        header('Location:../HTML-PHP/homepage.php');
        exit();
    }

}
?>
