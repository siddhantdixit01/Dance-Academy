<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script type="text/javascript" src="assets/js/jquery-3.6.4.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>

    <title>Dance Academy | Home Page</title>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid" style="padding-left:25px;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle colapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Dance Academy</a>
                <ul class="menubar">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="services.php">Our Services</a></li>
                    <li><a href="instructions.php">Our Instructions</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
            <div class="collpase navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php $url='http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>
                    <?php if(isset($_SESSION['student_user_id'])){ ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                            role="button" aria-haspopup="true" aria-expanded="false">Settings 
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="student_dashboard.php">Student</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                    <?php } elseif(isset($_SESSION['instructor_user_id'])){ ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                                role="button" aria-haspopup="true" aria-expanded="false">Settings 
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="instructor_dashboard.php">Instructor</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    <?php } elseif(isset($_SESSION['admin_user_id'])){ ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                                role="button" aria-haspopup="true" aria-expanded="false">Settings 
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="admin_dashboard.php">Admin</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    <?php } elseif ((!isset($_SESSION['admin_user_id'])|| 
                        !isset($_SESSION['instructor_user_id']) || 
                        !isset($_SESSION['student_user_id'])) && 
                        ($url=='http://127.0.0.1/danceAcademy/login.php')) {?>
                        <li><a href="register.php">Register</a></li>
                    <?php } elseif ((!isset($_SESSION['student_user_id'])|| 
                        !isset($_SESSION['instructor_user_id']) || 
                        !isset($_SESSION['admin_user_id'])) && 
                        ($url=='http://127.0.0.1/danceAcademy/register.php')) {?>
                        <li><a href="login.php">Login</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
