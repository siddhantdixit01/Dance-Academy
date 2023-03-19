<?php include('config/db.php');?>
<?php session_start();?>
<?php
    $admin_user_id = $_SESSION['admin_user_id'];
    if(!isset($admin_user_id)){
        header('location:login.php');
    }

?>
<?php include('inc/header.php');?>
    <div class="container">
        <div class="col-md-3">
            <?php include('sidebar/adminSidebar.php');?>

        </div>
        <div class="col-md-9">
            <div class="admin" style="display:flex;margin-top:10px;">
                <div class="instructors">
                    <a href="instructors.php" class="admin-dash">
                        <?php 
                            $sql="SELECT * FROM tbl_instructors;";
                            $result=mysqli_query($conn,$sql);    
                        ?>
                        <i class="fa fa-users"></i>
                        <span>Instructors (<?php echo mysqli_num_rows($result); ?>)</span>
                    </a>
                </div>
                <div class="students">
                    <a href="students.php" class="admin-dash">
                        <?php 
                            $sql="SELECT * FROM tbl_students;";
                            $result=mysqli_query($conn,$sql);    
                        ?>
                        <i class="fa fa-graduation-cap"></i>
                        <span>Students (<?php echo mysqli_num_rows($result); ?>)</span>
                    </a>
                </div>
                <div class="enrolled">
                    <a href="enrolledStudents.php" class="admin-dash">
                        <?php 
                            $sql="SELECT * FROM tbl_enrollment;";
                            $result=mysqli_query($conn,$sql);    
                        ?>
                        <i class="fa fa-user-plus"></i>
                        <span>Enrolled Students (<?php echo mysqli_num_rows($result); ?>)</span>
                    </a>
                </div>
                <div class="dance_forms">
                <a href="createDance.php" class="admin-dash">
                        <?php 
                            $sql="SELECT * FROM tbl_dance_forms;";
                            $result=mysqli_query($conn,$sql);    
                        ?>
                        <i class="fa fa-film"></i>
                        <span>Dance Forms (<?php echo mysqli_num_rows($result); ?>)</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.nav-<?php echo isset($_GET['page'])?$_GET['page']:'' ?>').addClass('active')
    </script>
<?php include('inc/footer.php');?>