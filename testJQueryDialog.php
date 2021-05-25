<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
          rel = "stylesheet">
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <title>JQuery Dialog</title>
</head>
<body>

<div id = "dialog-delete" >
    Do you really want to delete this user?
</div>
<button id = "delete">Delete</button>
<script type="text/javascript">
    $(function() {
        $("#dialog-delete").dialog({
            autoOpen: false,
            buttons: {
                Yes: function() {
                    alert("You have successfully deleted this user!");
                    $(this).dialog("close");
                },
                No: function (){
                    $(this).dialog("close");
                }
            },
        });
        $("#delete").click(function() {
            $("#dialog-delete").dialog("open");
        });
    });
</script>
</body>
</html>