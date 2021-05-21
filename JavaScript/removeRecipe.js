$('.deleteButton').on("click", function() {
    // if(userId == null)
    // {
    //     alert("You have to be logged in to save recipe to favourites!");
    // }
    // else {
    //     location.href = '../Handling/removeOpenedRecipe.php?userId=' + userId + '&recipeId=' + recipeId;
    // }
    location.href = '../Handling/removeOpenedRecipe.php?userId=' + userId + '&recipeId=' + recipeId;
});