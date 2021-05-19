<?php include '../DataLayer/UserDbControl.php'; ?>
<?php include '../DataLayer/RecipeDbControl.php'; ?>
<?php include '../LogicLayer/UserControl.php'; ?>
<?php
if(isset($_GET['userId']) && isset($_GET['recipeId'])) {
    $userId = (int)$_GET['userId'];
    $recipeId = (int)$_GET['recipeId'];
    $userDBControl = new UserDbControl();
    $userControl = new UserControl();
    $userDBControl->GetUsers($userControl);

    $recipeDBControl = new RecipeDbControl();

    $user = $userControl->GetUser($userId);
    if($user != null && $user->GetIsAdmin() == true){
        $recipeDBControl->RemoveRecipe($recipeId);
        echo 'removed!';
    }

}
?>
