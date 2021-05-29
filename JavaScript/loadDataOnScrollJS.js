$(document).ready(function (){

    var flag = 0;

    $.ajax({
        type: "GET",
        url: "../Handling/loadDataOnScroll.php",
        data:{
            'offset': 0,
            'limit': 3
        },
        success: function(recipes){
            $('body').append((recipes));
            flag += 3;
        }
    });

    $.ajax({
        type: "GET",
        url: "../Handling/loadDataOnScroll.php",
        data:{
            'offset': 3,
            'limit': 3
        },
        success: function(recipes){
            $('body').append((recipes));
            flag += 3;
        }
    });

    $.ajax({
        type: "GET",
        url: "../Handling/loadDataOnScroll.php",
        data:{
            'offset': 6,
            'limit': 3
        },
        success: function(recipes){
            $('body').append((recipes));
            flag += 3;
        }
    });

    $.ajax({
        type: "GET",
        url: "../Handling/loadDataOnScroll.php",
        data:{
            'offset': 9,
            'limit': 3
        },
        success: function(recipes){
            $('body').append((recipes));
            flag += 3;
        }
    });

    $.ajax({
        type: "GET",
        url: "../Handling/loadDataOnScroll.php",
        data:{
            'offset': 12,
            'limit': 3
        },
        success: function(recipes){
            $('body').append((recipes));
            flag += 3;
        }
    });

    /*$(window).scroll(function (){
        if($(window).scrollTop() >= $(document).height() - $(window).height()){
            $.ajax({
                type: "GET",
                url: "../Handling/loadDataOnScroll.php",
                data:{
                    'offset': flag,
                    'limit': 3

                },
                success:function (recipes){
                    $('body').append((recipes));
                    flag += 3;
                }
            });
        }
    });*/
});