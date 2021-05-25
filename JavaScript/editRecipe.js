$('.editButton').on("click", function() {
    location.href = '../HTML-PHP/recipe-CreateEdit.php?userId=' + userId + '&recipeId=' + recipeId;
});