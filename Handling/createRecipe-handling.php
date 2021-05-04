<?php include '../DataLayer/RecipeDbControl.php';?>
<?php
if(isset($_POST['title']) && isset($_POST['calories']) && isset($_POST['cuisine']) && isset($_POST['duration'])
    && isset($_POST['difficulty']) && isset($_POST['servings']) && isset($_POST['ingredients'])
    && isset($_POST['instructions']))
{



    $title = (string) $_POST['title'];
    $calories = (string) $_POST['calories'];
    $cuisine = (string) $_POST['cuisine'];
    $duration = "{$_POST['duration']} {$_POST['duration-units']}";
    $difficulty = (string) $_POST['difficulty'];
    $servings = (string) $_POST['servings'];
    $ingredients = (string) $_POST['ingredients'];
    $instructions = (string) $_POST['instructions'];

    $target_dir = "../RecipesImages/";
    $filename   = $title . "-" . time();
    $extension  = strtolower(pathinfo( $_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION ));
    $basename   = $filename . "." . $extension;

    $destination  = "{$target_dir}{$basename}";
    $uploadOk = 1;


    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    $possible_extensions = array('gif', 'png', 'jpg', 'jpeg');
    if(!in_array($extension, $possible_extensions)){
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $destination)) {
            $recipeDbControl = new RecipeDbControl();
            $msg = $recipeDbControl->InsertRecipe($destination, $title, $calories, $cuisine, $duration, $difficulty, $servings, $ingredients, $instructions);
            session_start();
            $_SESSION['msg-create-recipe'] = $msg;
            header('Location:../HTML-PHP/createRecipe.php');
            exit();
        }
    }


}
else{

}
?>