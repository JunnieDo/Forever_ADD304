<?php
    if (isset($_SESSION['login_email']) && $_SESSION['loggedIn'] && isset($_SESSION['loggedIn'])) {
        echo    "<div id=\"Logo\">
                    <a href=\"index.php\">Furever</a>
                    <a href=\"index.php?logout=1\" class=\"user-btn\">Log Out</a>
                    <a href=\"profile.php\" class=\"user-btn\" style=\"margin-left: 10px;\"><i class=\"fa-regular fa-user\"></i></a>
                </div>";
        echo    "<ul>";
        echo        "<li><a href=\"cat.php\"><i class=\"fa-solid fa-cat\"></i></a></li>";
        echo        "<li><a href=\"dog.php\"><i class=\"fa-solid fa-dog\"></i></a></li>";
        echo    "</ul>";
    }
    else {
        echo    "<div id=\"Logo\">
                    <a href=\"index.php\">Furever</a>
                    <a href=\"Login.php\" class=\"user-btn\">Log in/Sign up</a>
                </div>";
        echo    "<ul>";
        echo        "<li><a href=\"cat.php\"><i class=\"fa-solid fa-cat\"></i></a></li>";
        echo        "<li><a href=\"dog.php\"><i class=\"fa-solid fa-dog\"></i></a></li>";
        echo    "</ul>";
    }
    if (isset($_GET['logout'])) {
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit;
    }
?>
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="https://use.typekit.net/cfk5sas.css">
