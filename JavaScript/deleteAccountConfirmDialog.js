
$(function(){
    $("#dialog-delete-account").dialog({
        autoOpen: false,
        width: 470,
        height: 200,
        create: function (event) { $(event.target).parent().css({ 'position': 'fixed', 'left': '35%', 'top': '40%' }); },
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
        $("#dialog-delete-account").dialog("open")
    });

});
