
<?php
include '../DataLayer/UserDbControl.php';
include '../DataLayer/RecipeDbControl.php';


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
                if(isset($_SESSION['loggedUser'])) {
                    $loggedUser = unserialize($_SESSION['loggedUser']);
                    if($loggedUser->GetIsAdmin()) {
                        echo '<a href="../HTML-PHP/manageUsers.php">Users</a>';
                    }
                }
                ?>
                <?php
                    if (isset($_SESSION['loggedUser'])) {
                        echo '<a href="../HTML-PHP/accountPage.php"><i class="fa fa-fw fa-user"></i></a>';
                        echo '<a href="../Handling/logout-handling.php"><i class="fas fa-sign-out-alt"></i></a>';
                    }
                    else{
                        echo '<a href="../HTML-PHP/login.php"><i class="fa fa-fw fa-user"></i></a>';
                    }
                ?>
            </div>
        </div>
        <ul>
            <li><a href="../HTML-PHP/homepage.php">Home</a></li>
            <li><a href="../HTML-PHP/recipesPage.php">Recipes</a></li>
            <li><a href="../HTML-PHP/aboutPage.php">About</a></li>

            <?php
            if(isset($_SESSION['loggedUser'])) {
                $loggedUser = unserialize($_SESSION['loggedUser']);
                if($loggedUser->GetIsAdmin()) {
                    echo '<li><a href="../HTML-PHP/manageUsers.php">Users</a></li>';
                }
            }
            ?>

            <?php
                if (isset($_SESSION['loggedUser'])) {
                    echo '<li><a href="../HTML-PHP/accountPage.php"><i class="fa fa-fw fa-user"></i></a></li>';
                    echo '<li><a href="../Handling/logout-handling.php"><i class="fas fa-sign-out-alt"></i></a></li>';
                }
                else{
                    echo '<li><a href="../HTML-PHP/login.php"><i class="fa fa-fw fa-user"></i></a></li>';
                }
            ?>
        </ul>
    </nav>
    <div id="mobileHeader"></div>
</header>