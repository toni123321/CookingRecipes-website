
var closebtns = document.getElementsByClassName("remove");
$(".remove").click(function() {
    var userIndex = $(this).index('.remove');
    location.href = "../Handling/removeUser.php?userIndex=" + userIndex;
    // var xhttp = new XMLHttpRequest();
    // xhttp.onreadystatechange = function () {
    //     if (this.readyState == 4 && this.status == 200) {
    //         alert("You have successfully removed user with id: " + this.responseText.trim());
    //     }
    // };
    // xhttp.open("GET", "../Handling/removeUser.php?userIndex=" + userIndex, true);
    // xhttp.send();
});
