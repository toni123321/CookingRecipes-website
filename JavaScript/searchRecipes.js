
function searchRecipes() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var input = this.responseText;
            $('.grid').html(input);
        }
    };
    let searchInput = $('#searchInput').val();
    xhttp.open("GET", "../Handling/searchRecipes.php?searchInput=" + searchInput, true);
    xhttp.send();

}

$('#searchBtn').click(searchRecipes);