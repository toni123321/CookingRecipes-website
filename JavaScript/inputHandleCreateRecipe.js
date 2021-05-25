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
        let regex = /^[A-Za-z0-9]{2,70}$/;
        let title = $(this).val();

        if(!regex.test(title)) {
            this.setCustomValidity("Title is not in the correct format!");
        }
        else{
            this.setCustomValidity("");
        }
    };
    $("input[name=calories]")[0].onchange = function () {
        let regex = /^[0-9]{1,}$/;
        let calories = $(this).val();

        if(!regex.test(calories)) {
            this.setCustomValidity("Calories is not in the correct format!");
        }
        else{
            this.setCustomValidity("");
        }
    };

    function IsElementFromDatalistSelected(inputValue, datalist) {
        //var inputCuisine = $('input[name=cuisine]').val();
        //var cuisineChildren = $('#cuisine').children();

        let isInputSelected = false;
        for (let i = 0; i < datalist.length; i++) {
            if (datalist[i].value === inputValue) {
                isInputSelected = true;
            }
        }
        return isInputSelected;
    }
    $("input[name=cuisine]")[0].onchange = function () {
        let isElementSelected = IsElementFromDatalistSelected($('input[name=cuisine]').val(),
            $('#cuisine').children());
        if (!isElementSelected) {
            this.setCustomValidity("Please, choose cuisine from the dropdown!");
        } else {
            this.setCustomValidity("");
        }
    }

    $("input[name=duration]")[0].onchange = function () {
        let regex = /^[0-9]{1,3}$/;
        let duration = $(this).val();

        if(!regex.test(duration)) {
            this.setCustomValidity("Duration is not in the correct format!");
        }
        else{
            this.setCustomValidity("");
        }
    };

    $("input[name=duration-units]")[0].onchange = function () {
        let isElementSelected = IsElementFromDatalistSelected($('input[name=duration-units]').val(),
            $('#duration-units').children());
        if (!isElementSelected) {
            this.setCustomValidity("Please, choose duration unit from the dropdown!");
        } else {
            this.setCustomValidity("");
        }
    }

    $("input[name=difficulty]")[0].onchange = function () {
        let isElementSelected = IsElementFromDatalistSelected($('input[name=difficulty]').val(),
            $('#difficulty').children());
        if (!isElementSelected) {
            this.setCustomValidity("Please, choose difficulty from the dropdown!");
        } else {
            this.setCustomValidity("");
        }
    }

    $("input[name=servings]")[0].onchange = function () {
        let regex = /^[0-9]{1,3}$/;
        let servings = $(this).val();

        if(!regex.test(servings)) {
            this.setCustomValidity("Servings value is not in the correct format!");
        }
        else{
            this.setCustomValidity("");
        }
    };

});
