<?php
echo
'
    <header>
        <div id="name"><h3>NAME</h3></div>
        <nav>
            <div class="dropdown">
                <button class="dropbtn">Menu</button>
                <div class="dropdown-content">
                    <a href="#">Home</a>
                    <a href="#">Recipes</a>
                    <a href="#">About</a>
                    <a href="#">Account</a>
                </div>
            </div>
            <ul>
                <li><a href="../HTML-PHP/homepage.php">Home</a></li>
                <li><a href="../HTML-PHP/recipesPage.php">Recipes</a></li>
                <li><a href="../HTML-PHP/aboutPage.php">About</a></li>
                <li><a href="">Account</a></li>
            </ul>
        </nav>
        <div id="mobileHeader"></div>
        <div id="search">
            <form action="#">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </header>
';
?>