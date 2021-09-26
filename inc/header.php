<?php
include 'lib/Session.php';
Session::init();
include 'lib/Database.php';
include 'helpers/Format.php';

spl_autoload_register(function ($class){
    include_once "classes/".$class.".php";
});

$db = new Database();
$fm = new Format();
$cmr = new Customer();
$app = new Appointment();
$ticket = new Ticket();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="description" content="description"/>
    <meta name="keywords" content="keywords"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Zoo</title>
    <!-- styles-->
    <link rel="stylesheet" href="css/styles.min.css"/>
    <!-- web-font loader-->
    <script>
        WebFontConfig = {

            google: {

                families: ['Nunito+Sans:300,400,500,700,900', 'Quicksand:300,400,500,700'],

            }

        }

        function font() {

            var wf = document.createElement('script')

            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js'
            wf.type = 'text/javascript'
            wf.async = 'true'

            var s = document.getElementsByTagName('script')[0]

            s.parentNode.insertBefore(wf, s)

        }

        font()
    </script>

    <style>
        .main-menu__item .main-menu__link{
            color: #ffffff;
        }
        .main-menu__item .main-menu__link:hover{
            color: #000000;
        }
    </style>
</head>
<body>
<div class="page-wrapper">
    <!-- menu dropdown start-->
    <div class="menu-dropdown">
        <div class="menu-dropdown__inner" data-value="start">
            <div class="screen screen--start">

                <div class="screen__item"><a class="screen__link item--active" href="index.php">Home</a></div>
                <div class="screen__item"><a class="screen__link" href="animals.php">Animals</a></div>
                <div class="screen__item"><a class="screen__link" href="appointment.php">Online VET Appointment</a></div>
                <div class="screen__item"><a class="screen__link" href="contacts.php">Contacts</a></div>
                <div class="screen__item"><a class="screen__link" href="tickets.php">Tickets</a></div>

                <ul class="screen__socials">
                    <li><a class="item--facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a class="item--twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a class="item--youtube" href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                    <li><a class="item--instagram" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul><a class="screen__button" href="login.php">Sign Up</a>
            </div>
        </div>
        <div class="menu-dropdown__inner" data-value="home">
            <div class="screen screen--sub">
                <div class="screen__heading">
                    <h6 class="screen__back">
                        <svg class="icon">
                            <use xlink:href="#chevron-left"></use>
                        </svg> <span>Home</span>
                    </h6>
                </div>
                <div class="screen__item item--active"><a class="screen__link" href="index.php">Home Zoo</a></div>
            </div>
        </div>
    </div>
    <!-- menu dropdown end-->
    <!-- header start-->
    <header class="header header-common">
        <div class="header__top" style="background: #74C016;">
            <div class="row align-items-center">
                <div class="col-6 col-lg-4"><a class="logo" href="index.php"><img class="logo__img" src="img/tigers.png" alt="logo"/></a></div>
                <div class="col-6 col-lg-8 d-flex justify-content-end">
                    <!-- main menu start-->
                    <ul class="main-menu">
                        <li class="main-menu__item"><a class="main-menu__link main-menu__item--active" href="index.php"><span>Home</span></a></li>
                        <?php $login = Session::get("cusLogin");
                        if($login == true) {?>

                        <li class="main-menu__item"><a class="main-menu__link" href="profile.php"><span>Profile</span></a></li>
                        <?php } ?>
                        <li class="main-menu__item"><a class="main-menu__link" href="animals.php"><span>Animals</span></a></li>
                        <li class="main-menu__item"><a class="main-menu__link" href="appointment.php"><span>VET Appointment</span></a></li>
                        <li class="main-menu__item"><a class="main-menu__link" href="tickets.php"><span>Tickets</span></a></li>
                        <li class="main-menu__item"><a class="main-menu__link" href="contacts.php"><span>Contacts</span></a></li>

                    </ul>
                    <!-- main menu end-->
                    <?php
                    if (isset($_GET['action']) && $_GET['action'] == "logout"){
                        Session::destroy();
                        echo '<script type="text/javascript"> window.location.assign("index.php") </script>';
                    }
                    ?>
                    <?php
                    $login = Session::get("cusLogin");
                    if($login == true){ ?>
                    <a class="header__button" href="?action=logout">Logout</a>
                    <?php } else{
                    ?>
                    <a class="header__button" href="login.php">Sign UP</a>
                    <?php } ?>
                    <!-- menu-trigger start-->
                    <div class="hamburger">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                    <!-- menu-trigger end-->
                </div>
            </div>
        </div>
        <div class="header__lower">
            <div class="row">
                <div class="col-auto d-flex align-items-center">

                    <!-- lang select end-->
                    <ul class="header__socials">
                        <li><a class="item--facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a class="item--twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a class="item--youtube" href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                        <li><a class="item--instagram" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- header end-->