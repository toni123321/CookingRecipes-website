<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create recipes</title>
    <?php include '../HTML-PHP/stylesheetScripts.php';?>
    <link rel="stylesheet" href="../CSS/createRecipe-styles.css">
    <script src="../Libraries/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php include '../HTML-PHP/main.php';?>
    <?php
    if(isset($_SESSION['msg-create-recipe']))
    {
        echo '<h2 class="msg">'. $_SESSION['msg-create-recipe'] .'</h2>';
        unset($_SESSION['msg-create-recipe']);
    }
    ?>
    <form id="createRecipe" action="../Handling/createRecipe-handling.php" method="post" enctype="multipart/form-data">
        <label for="title"><b>Select image to upload</b></label>
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <label for="title"><b>Title</b></label>
        <input id="title" type="text" placeholder="Enter title" name="title" required>
        <label for="calories"><b>Calories</b></label>
        <input type="text" placeholder="Enter calories" name="calories" required>
        <label for="cuisine"><b>Cuisine</b></label>
        <input list="cuisine" placeholder="Choose cuisine" name="cuisine" required>
        <datalist id="cuisine">
            <option value="ITALIAN">
            <option value="CHINESE">
            <option value="JAPANESE">
            <option value="MEXICAN">
            <option value="CHINESE">
            <option value="THAI">
            <option value="AMERICAN">
            <option value="INDIAN">
            <option value="BALKAN">
            <option value="ARAB">
        </datalist>
        <label for="duration"><b>Duration</b></label>
        <div class="duration">
            <input type="text" placeholder="Enter duration" name="duration" required>
            <input list="duration-units" placeholder="units.." name="duration-units" required>
            <datalist id="duration-units">
                <option value="min">
                <option value="hours">
            </datalist>
        </div>
        <label for="difficulty"><b>Difficulty</b></label>
        <input list="difficulty" placeholder="Choose difficulty" name="difficulty" required>
        <datalist id="difficulty">
            <option value="EASY">
            <option value="MEDIUM">
            <option value="HARD">
            <option value="EXPERT">
        </datalist>
        <label for="servings"><b>Servings</b></label>
        <input type="text" placeholder="Enter number of servings" name="servings" required>
        <label for="ingredients"><b>Ingredients</b></label>
        <textarea name="ingredients" id="" cols="30" rows="10" required></textarea>

        <label for="instructions"><b>Instructions</b></label>
        <textarea name="instructions" id="" cols="30" rows="10" required></textarea>
        <button id="createRecipeBtn" type="submit">Create new recipe</button>

    </form>
    <script src="../JavaScript/inputHandleCreateRecipe.js"></script>
</body>
</html>