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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" 
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" 
    integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" 
    integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Dance Academy | Home Page</title>
    <style>

        .wrapper{
            width: 90%;
            margin: 0 auto;
            padding-bottom: 20px;
        }
        .category-box{
            margin-top: 10px;
            padding: 30px 0px 15px 0px;
            background-color: #fff;
            box-shadow: 0 .5rem 1rem rgbaO(0,0,0,.1);
            text-align: center;
            border: 1px solid #8e8484;
            border-top: 4px solid #c09a2b;
            border-bottom: 4px solid #922bc0;
        }
        .category-box span{
            margin: 10px 0px;
            font-size: 16px;

        }

        .category_name{
            text-align: center; padding: 3px 0px 13px 0px; color: #000; margin: 20px 0px 0px 0px;
        }

        .category_name span{
            font-weight: bold;
            color: #353131;

        }
        .trend{
            position: absolute;
            top: 17px;
            left: 10px;
            border-radius: 0.5rem;
            padding: 4px 10px;
            font-size: 14px;
            color: #FFF;
            background-color: #c09a2b;
        }
        


        .enrollBox{
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: -webkit-fill-available;
            padding: 15px;

        }
    </style>
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
                    <li><a href="staff.php">Our Instructors</a></li>
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
                    <?php 
                        } 
                        if (!isset($_SESSION['student_user_id'])&& 
                        !isset($_SESSION['instructor_user_id']) &&
                        !isset($_SESSION['admin_user_id'])) {?>
                        <li><a href="login.php">Login</a></li>
                    <?php }
                        if (!isset($_SESSION['admin_user_id'])&&
                        !isset($_SESSION['instructor_user_id']) && 
                        !isset($_SESSION['student_user_id']) ) {
                    ?>
                        <li><a href="register.php">Register</a></li>
                    

                    <?php }
                    $url = 'http://' .$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
                    if($url == "http://127.0.0.1/danceacademy/login.php"){?>
                        <li><a href="register.php">Register</a></li>
                    <?php } 
                    else if($url == "http://127.0.0.1/danceacademy/register.php"){
                    ?>
                        <li><a href="login.php">Login</a></li>
                    <?php } 
                    else if($url == "http://127.0.0.1/danceacademy/index.php"
                    && ( !isset($_SESSION['admin_user_id'])
                        || !isset($_SESSION['instructor_user_id'])
                        || !isset($_SESSION['student_user_id']))){ 
                    ?>
                        <li><a href="register.php">Register</a></li>
                        <li><a href="login.php">Login</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>