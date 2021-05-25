
$(function(){
    $("#dialog-delete-account").dialog({
        autoOpen: false,
        buttons: {
            Yes: function() {
                $(this).dialog("close");
                location.href = '../Handling/removeUserAccountByUser.php';

            },
            No: function (){
                $(this).dialog("close");
            }
        },
    });
    $("#deleteAccount").click(function() {
        $("#dialog-delete-account").dialog("open");
    });
});
