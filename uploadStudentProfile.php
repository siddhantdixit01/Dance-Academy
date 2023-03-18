<?php include('config/db.php');?>
<?php session_start();?>
<?php
    $student_user_id = $_SESSION['student_user_id'];
    if(!isset($student_user_id)){
        header('location:login.php');
    }
    if(isset($_POST['submitStudentData'])){
        $user_id =  $_SESSION['student_user_id'];
        $student_name = $_SESSION['username'];
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $student_role_id =  $_SESSION['student_role_id'];
        $image= $_FILES['student_image']['name'];
        $image_size= $_FILES['student_image']['size'];
        $tmp_name= $_FILES['student_image']['tmp_name'];
        $img_path= 'uploads/students/'.$image;
        $doj= date('Y/m/d');
        if(!empty($image)){
            if($image_size > 2000000){
                $message[] = 'image file size is too large';
                
            }else{
                $studentProfile = "INSERT INTO tbl_students(user_id, student_name, age, gender, user_role_id, address, student_image, doj) 
                VALUES('$user_id', '$student_name', '$age', '$gender', '$student_role_id', '$address', '$img_path' ,'$doj')";
                  mysqli_query($conn, $studentProfile);
                  move_uploaded_file($tmp_name, $img_path);
                  header('location:student_dashboard.php');

            }
        }


    }

?>
<?php include('inc/header.php');?>
    <div class="container">
        <div class="col-md-3">
            <?php include('sidebar/studentSidebar.php');?>

        </div>
        <div class="col-md-9">
            <h3>UPLOAD PROFILE</h3>
            <form method="post" action="uploadStudentProfile.php" enctype="multipart/form-data">
             <div class="box">
                <div class="row" style="padding: 0px 30px; margin-bottom: 10px; ">
                     <div class="col-md-5">
                        <div class="form-group">
                            <label>Age</label>
                            <input type="text" name="age" class="form-control" required="" placeholder="Age">

                        </div>

                     </div>  
                     <div class="col-md-5">
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            

                        </div>
                        

                     </div>

                </div>
                  <div class="row" style="padding: 0px 30px;">
                  <div class="col-md-5">
                  <div class="form-group">
                            <label>Date of Joining</label>
                            <input type="text" name="doj" id="datepicker" class="form-control" required="" placeholder="Date of Join">

                        </div>
                       

                  </div>
                  <div class="col-md-5">
                  <div class="form-group">
                            <label>Address</label>
                           <textarea class="form-control" name="address" placeholder="Address"></textarea>

                        </div>
                       

                  </div>


                  </div>
                  <div class="row" style="padding: 0px 30px;">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Upload Image</label>
                                <input type="file" name="student_image" class="form-control">
                                  

                            </div>
                            

                        </div>

                  </div>
                  <div class="row" style="padding: 0px 30px;">
                  <div class="col-md-5">
                            <div class="form-group">
                                <input type="submit" name="submitStudentData" value="Upload Profile" class="btn btn-success">
                                  

                            </div>
                            

                        </div>

                  </div>

             </div>
            </form>
        </div>










</div>    
    <script>
        $('.nav-<?php echo isset($_GET['page'])?$_GET['page']:'' ?>').addClass('active')
    </script>
<?php include('inc/footer.php');?>