var closebtns = document.getElementsByClassName("remove");
$(".remove").click(function() {
    var userIndex = $(this).index('.remove');
    location.href = "../Handling/removeUser.php?userIndex=" + userIndex;
});

var editbtns = document.getElementsByClassName("edit");
$(".edit").click(function() {
    var userIndex = $(this).index('.edit');
    location.href = "../HTML-PHP/editSelectedUser.php?userIndex=" + userIndex;
});