
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header>
    <div id="name"><h3>NAME</h3></div>
    <nav>
        <div class="dropdown">
            <button class="dropbtn">Menu</button>
            <div class="dropdown-content">
                <a href="../HTML-PHP/homepage.php">Home</a>
                <a href="../HTML-PHP/recipesPage.php">Recipes</a>
                <a href="../HTML-PHP/aboutPage.php">About</a>
                <?php
                    if (isset($_SESSION['loggedUser'])) {
                        echo '<a href="../HTML-PHP/accountPage.php">Account</a>';
                        echo '<li><a href="../Handling/logout-handling.php">Log out</a></li>';

                    }
                    else{
                        echo '<a href="../HTML-PHP/login.php">Log in</a>';
                    }
                ?>
            </div>
        </div>
        <ul>
            <li><a href="../HTML-PHP/homepage.php">Home</a></li>
            <li><a href="../HTML-PHP/recipesPage.php">Recipes</a></li>
            <li><a href="../HTML-PHP/aboutPage.php">About</a></li>
            <?php
                if (isset($_SESSION['loggedUser'])) {
                    echo '<li><a href="../HTML-PHP/accountPage.php">Account</a></li>';
                    echo '<li><a href="../Handling/logout-handling.php">Log out</a></li>';
                }
                else{
                    echo '<li><a href="../HTML-PHP/login.php">Log in</a></li>';
                }
            ?>
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