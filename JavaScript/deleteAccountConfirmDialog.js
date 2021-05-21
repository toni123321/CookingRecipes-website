$( function() {
    $( ".deleteAccount" ).dialog({
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons:
            {
            "Confirm account deletion": function() {
                $( this ).dialog( "../Handling/removeUserAccountByUser.php" );
            },
            Cancel: function() {
                $( this ).dialog( "close" );
            }
        }
    });
} );