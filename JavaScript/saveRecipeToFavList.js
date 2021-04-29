function saveRecipe()
{
    if(userId == null)
    {
        alert("You have to be logged in to save recipe to favourites!");
    }
    else {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if($('.fa-heart-o').css("color") == 'rgb(255, 0, 0)') {
                    $('.fa-heart-o').css("color", "white");
                    alert("You remove recipe from favourites!");
                }
                else {
                    $('.fa-heart-o').css("color", "red");
                    alert("You have successfully added this recipe to favourites!");
                }
                isRecipeSavedToFavList = !isRecipeSavedToFavList;

            }
        };
        xhttp.open("GET", "../Handling/saveRecipeToFavList.php?userId=" + userId + "&recipeId=" + recipeId + "&isRecipeSavedToFavList=" + isRecipeSavedToFavList, true);
        xhttp.send();

    }


}

$('.saveRecipeToFavList').click(saveRecipe);


function loadRecipePage() {
    if (isRecipeSavedToFavList)
    {
        $('.fa-heart-o').css("color", "red");
    }
    else{
        $('.fa-heart-o').css("color", "white");
    }
}

$(document).ready(loadRecipePage);