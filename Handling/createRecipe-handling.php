<?php include '../DataLayer/RecipeDbControl.php';?>
<?php
if(isset($_POST['title']) && isset($_POST['calories']) && isset($_POST['cuisine']) && isset($_POST['duration'])
    && isset($_POST['difficulty']) && isset($_POST['servings']) && isset($_POST['ingredients'])
    && isset($_POST['instructions']))
{
    $target_dir = "../RecipesImages/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }


    $title = (string) $_POST['title'];
    $calories = (string) $_POST['calories'];
    $cuisine = (string) $_POST['cuisine'];
    $duration = "{$_POST['duration']} {$_POST['duration-units']}";
    $difficulty = (string) $_POST['difficulty'];
    $servings = (string) $_POST['servings'];
    $ingredients = (string) $_POST['ingredients'];
    $instructions = (string) $_POST['instructions'];

    $recipeDbControl = new RecipeDbControl();
    $msg = $recipeDbControl->InsertRecipe($title, $calories, $cuisine, $duration, $difficulty, $servings, $ingredients, $instructions);
    session_start();
    $_SESSION['msg-create-recipe'] = $msg;
    header('Location:../HTML-PHP/createRecipe.php');
    exit();

//    unset($_POST['title']);
//    unset($_POST['calories']);
//    unset($_POST['cuisine']);
//    unset($_POST['duration']);
//    unset($_POST['difficulty']);
//    unset($_POST['servings']);
//    unset($_POST['ingredients']);
//    unset($_POST['instructions']);
}
else{

}
?>