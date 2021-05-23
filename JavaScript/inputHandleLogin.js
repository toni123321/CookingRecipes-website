$(function(){
    $("input[name=email]")[0].onchange = function () {
         let regex = /^[A-Za-z0-9]+[^A-Za-z0-9@]?[A-Za-z0-9]*@[A-z-]+[.][a-z]+$/;
         let email = $(this).val();

        if(!regex.test(email)) {
            this.setCustomValidity("Email is not in the correct format!");
        }
        else{
            this.setCustomValidity("");
        }
    };

    $("input[name=password]")[0].onchange = function () {
        let regex = /^(?=.*\d)(?=.*[A-Z])(?=.*[a-z]).{8,}$/;
        let password = $(this).val();

        if(!regex.test(password)) {
            this.setCustomValidity("Password is not in the correct format(Min:8 symbols, including 1 capital letter, 1 small letter, 1 digit)");
        }
        else{
            this.setCustomValidity("");
        }
    };
});