$('.editButton').on("click", function() {
    location.href = '../HTML-PHP/createRecipe.php?userId=' + userId + '&recipeId=' + recipeId;
});