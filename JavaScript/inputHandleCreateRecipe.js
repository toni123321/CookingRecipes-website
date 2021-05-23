// $('#createRecipeBtn').click(function() {
//     // Handle all the input from the form
//     if($("#title").val() == "Hello")
//     {
//         alert("You write Hello!");
//         $('#createRecipe').submit();
//     }
//     else{
//         $('#createRecipe').submit(function(e){
//             alert('Error');
//             e.preventDefault(e);
//         });
//         // $('.msg').text("error");
//     }
// });


$(function(){
    $("input[name=title]")[0].onchange = function () {
        if($(this).val().length < 5) {
            this.setCustomValidity("Please enter at least 5 characters.");
        }
        else{
            this.setCustomValidity("");
        }
    };
});
