$('#createRecipeBtn').click(function() {
    // Handle all the input from the form
    if($("#title").val() == "Hello")
    {
        alert("You write Hello!");
        $('#createRecipe').submit();
    }
    else{
        $('#createRecipe').submit(function(e){
            alert('Error');
            e.preventDefault(e);
        });
        // $('.msg').text("error");
    }
});