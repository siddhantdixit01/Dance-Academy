<?php include('config/db.php');?>
<?php session_start();?>
<?php
    $instructor_user_id = $_SESSION['instructor_user_id'];
    if(!isset($instructor_user_id)){
        header('location:login.php');
    }

?>
<?php include('inc/header.php');?>
    <div class="container">
        <div class="col-md-3">
            <?php include('sidebar/instructorSidebar.php');?>
        </div>
        <div class="col-md-9">
            <h3 style="text-transform: uppercse;">Instructor Dashboard</h1>
            <div class="jumbotron" style="margin-top:10px;background-color:#f9f9f9;
            border:1px solid #ccc;border-radius:unset;padding-right:30px;padding-left:30px;">
                <div class="row">
                    <div class="col-md-4">
                        <p style="text-align:center;">
                            <img src="assets/img/avatar.jpg" alt="Profile Image" 
                            style="width:50%;border-radius:50%;border:1px solid #FFF;">
                        </p>
                        <h2 style="text-align:center;">
                            <?php echo $_SESSION['username']; ?>
                        </h2>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between 
                            align-items-center">
                                Age
                            <span class="badge bg-primary rounded-pill"></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between 
                            align-items-center">
                                Experience
                            <span class="badge bg-primary rounded-pill">Years</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between 
                            align-items-center">
                                Gender
                            <span class="badge bg-primary rounded-pill"></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between 
                            align-items-center">
                                Date of Join
                            <span class="badge bg-primary rounded-pill"></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between 
                            align-items-center">
                                Address
                            <span class="badge bg-primary rounded-pill"></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-group skills">
                            <form action="instructor_dashboard.php" method="post">
                                <li class="list-group-item d-flex justify-content-between 
                                align-items-center" style="display:flex;">
                                    <select name="dance_name" class="form-control"
                                    style="width:90%;margin-right:10px;">
                                        <option>Select</option>
                                        <option value=""></option>
                                    </select>
                                    <input type="submit" value="ADD">
                                </li>
                                <li class="list-group-item d-flex justify-content-between 
                                align-items-center">
                                    
                                </li>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

<?php include('inc/footer.php');?>