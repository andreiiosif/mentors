<?php
    session_start();
?>

<!DOCTYPE html>
<head>
    <title>Mentors</title>
    
    <meta charset="UTF-8">
	<meta name="description" content="Blog Website">
	<meta name="keywords" content="Afaceri Business Mentenanta">
	<meta name="author" content="Ioja Andrei-Iosif">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge">

    <link rel = "stylesheet" type = "text/css" href = "css/style.css">
    <link rel = "stylesheet" type = "text/css" href = "css/index_style.css">
    <link rel = "stylesheet" type = "text/css" href = "css/signup_style.css">
    <link rel = "stylesheet" type = "text/css" href = "css/login_style.css">
    <link rel = "stylesheet" type = "text/css" href = "css/myacc_style.css">
    <link rel = "stylesheet" type = "text/css" href = "css/myacc_edit_style.css">
    <link rel = "stylesheet" type = "text/css" href = "css/contact_style.css">
    <link rel = "stylesheet" type = "text/css" href = "css/blog_style.css">
    <link rel = "stylesheet" type = "text/css" href = "css/write_blog_style.css">

    <link rel = "icon" type = "image/x-icon" href = "photos/logos/logo_fav.ico">
    <link href="https://fonts.googleapis.com/css?family=Acme|Bevan|Chango|Heebo:400,900|Acme|Bitter|Pangolin|Roboto|Exo&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/d177ce1a60.js" crossorigin="anonymous"></script>
    <script src="scripts/nav_menu.js"></script>
    <script src="scripts/time_data.js"></script>
    <script src="scripts/autosize-master/dist/autosize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

<header class = "header-wrapper">
    <div class = "contact-bar">
        <div class = "cb-column cb-c1">
        <i class="fa fa-flag" aria-hidden="true"></i>Română
            <!--<div class = "cb-phone">
                <div class = "cb-item"><i class="fas fa-phone-square-alt"></i></div>
                <div class = "cb-item"><i class="fas fa-sms"></i></div>
                <div class = "cb-item cb-number">+40759532621</div>
            </div>-->
        </div>
        <div class = "cb-column cb-c2">Find your mentor</div>
        <div class = "cb-column cb-c3">
            <div class = "cb-wrapper">
                <div class = "cb-log">
                    <a href = "https://www.facebook.com/andrei.ioj"><i class="fab fa-facebook"></i></a>
                </div>
                <div class = "cb-log">
                    <a href = "https://iosif15dey.wixsite.com/the-professor"><i class="fas fa-blog"></i></a>
                </div>
            </div>
        </div>
    </div>
    <nav class = "nav-menu">
        <div class = "nav-logo"><a href="index.php">My <span class = "sp">M</span>entor</a></div>
        <div class = "nav-bar">
            <ul class = "nav-bar-list">
                <li><a href = "index.php">Home</a></li>
                <li><a href = "find_mentor.php">Mentors</a></li>
                <li><a href = "blog.php">Blog</a></li>
                <li><a href = "contact.php">Contact</a></li>
            </ul>
        </div>
        <div class = "sign-bar">
            <?php
            if(!isset($_SESSION['u_id'])) // Daca sunt conectat, afisez butonul My Account
            {
                echo '
                <form action = "login.php" method = "POST">
                <button type = "submit" name = "submit" class = "b-login">Login</button>
                </form>
                ';
            }
            else
            {
                echo '
                <form action = "myacc.php" method = "POST">
                <button type = "submit" name = "submit" class = "b-login">My Account</button>
                </form>
                ';
            }
            ?>
        </div>
        <div class = "button-bar">
            <div class = "text">
                Menu
            </div>
            <div class = "burger">
                <div class = "line1"></div>
                <div class = "line2"></div>
                <div class = "line3"></div>
            </div>
        </div>
    </nav>
    <div class = "hide-nav-bar">
            <ul class = "nav-bar-list">
                <li><a href = "index.php">Home</a></li>
                <li><a href = "find_mentor.php">Mentors</a></li>
                <li><a href = "blog.php">Blog</a></li>
                <li><a href = "contact.php">Contact</a></li>
            </ul>
    </div>

    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <script>
        $(document).ready(function() {
 
        setTimeout(function(){
            $('body').addClass('loaded');
            $('h1').css('color','#222222');
        }, 3000);

        });
    </script>
</header>