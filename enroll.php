<?php include('config/db.php');?>
<?php session_start();?>
<?php
    $student_role_id = $_SESSION['student_role_id'];
    if(!isset($student_role_id)){
        header('location:login.php');
    }
    else{ ?>
    <?php
    if(isset($_POST['enrollCourse'])){
        $student_name= $_POST['student_name'];
        $user_id= $_SESSION['student_user_id'];
        $user_role_id= $_SESSION['student_role_id'];
        $category_id= $_POST['category_id'];
        $dance_id= $_POST['dance_id'];
        $price= $_POST['price'];
        $address= $_POST['address'];
        $instructor_id= $_POST['instructor_id'];
        $shift= $_POST['shift'];
        $payment_method= $_POST['payment_method'];
        $doj= date('Y/m/d');
        
        $sql = "INSERT INTO tbl_enrollment(student_name, user_id, user_role_id,category_id,dance_id,price,address, instructor_id, shift, payment_method, date_of_join ) 
        VALUES ('$student_name', ' $user_id', '$user_role_id', ' $category_id', ' $dance_id', ' $price', ' $address', '$instructor_id', ' $shift', ' $payment_method', '$doj')";
        if(mysqli_query($conn,$sql)){
            header('location:index.php');
        }else{
            $message[] = 'Failed to enroll!';
        }  
    }
?>
<?php include('inc/header.php');?>
<div class="container">
    <div class="row">
        <h1 style="text-align: center; margin: 30px;"> ENROLL WITH US</h1>
    </div>
    <div class="section">
        <div class="enrollBox">
            <form class="form-horizontal" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <?php
                            $username= $_SESSION['username'];
                            $user_id= $_SESSION['student_user_id'];
                            $user_role_id= $_SESSION['student_role_id'];
                            $category_id= $_GET['cat_id'];
                            $dance_id= $_GET['did'];
                            $sql= "SELECT tbl_dance_categories.category_name, tbl_dance_forms.dance_name, 
                                tbl_dance_forms.price FROM tbl_dance_categories JOIN tbl_dance_forms ON 
                                tbl_dance_forms.category_id = tbl_dance_categories.category_id WHERE 
                                tbl_dance_categories.category_id = $category_id AND 
                                tbl_dance_forms.dance_id = $dance_id";
                            $getData = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($getData) > 0){
                                while($row = mysqli_fetch_assoc($getData)){
                        ?>
                            
                                    <label> Student Name</label>
                                    <input type="text" name="student_name" value="<?php echo $username;?>" 
                                        class="form-control">

                                    <label style="margin-top:20px;"> Category Name</label>
                                    <input type="text" value="<?php echo $row['category_name'];?>" 
                                    class="form-control">
                                    <input type="hidden" name="category_id" value="<?php echo $category_id;?>">

                                    <label style="margin-top:20px;"> Dance Form</label>
                                    <input type="text" name="dance_id" value="<?php echo $row['dance_name'];?>" 
                                    class="form-control">
                                    <input type="hidden" name="dance_id" value="<?php echo $dance_id;?>">

                                    <label style="margin-top:20px;"> Fees</label>
                                    <input type="text" name="price" value="<?php echo $row['price'];?>" 
                                    class="form-control">

                                    <label style="margin-top:20px;"> Address</label>
                                    <textarea name="address" class="form-control" cols="4" rows="30" 
                                    placeholder="Address"></textarea>
                        <?php 
                                } 
                            } 
                        ?>
                    </div>
                    <div class="col-md-6">
                        <ul>
                            <?php
                                $sql ="SELECT * FROM tbl_instructor_dance_forms JOIN tbl_instructors ON 
                                    tbl_instructor_dance_forms.user_id= tbl_instructors.user_id WHERE 
                                    tbl_instructor_dance_forms.dance_id= $dance_id";
                                $getInstructors = mysqli_query($conn, $sql);
                                if(mysqli_num_rows($getInstructors) >0){
                                    while($row= mysqli_fetch_assoc($getInstructors)){
                            ?>
                                        <li style="display: inline-block;">
                                            <img src="<?php echo $row['instructor_image'];?>" 
                                                style="width:75px;">
                                            <span style="display: block; font-size: 10px; margin-top: 10px; ">
                                                <?php echo $row['instructor_name'];?>
                                            </span>
                                        </li>
                                <?php 
                                    }?>
                                                        <?php } ?>
                        </ul>

                        <label>Instructor Name</label>
                        <select name="instructor_id" class="form-control">
                             <option>Select</option>
                             <?php
                             $sql ="SELECT * FROM tbl_instructor_dance_forms JOIN tbl_instructors ON tbl_instructor_dance_forms.user_id= tbl_instructors.user_id
                             WHERE tbl_instructor_dance_forms.dance_id= $dance_id";
                                                 $getInstructors = mysqli_query($conn, $sql);
                                                 if(mysqli_num_rows($getInstructors) >0){
                                                    while($row= mysqli_fetch_assoc($getInstructors)){?>
                                                    <option value="<?php echo $row['instructor_id']?>">
                                                    <?php echo $row['instructor_name'];?>
                                                    </option>
                                                    <?php } ?>
                                                    <?php } ?>


                             


                        </select>

                        <label style="margin-top:20px;">Shift Time</label>
                        <select name="shift" class="form-control">
                            <option>Select</option>
                            <option>Morning(09:00-12:00)</option>
                            <option>Afternoon(12:00-03:00)</option>
                            <option>Evening(03:00-06:00)</option>

                        </select>

                        <label style="margin-top:20px;">Payment Method</label>
                        <select name="shift" class="form-control">
                            <option>Select</option>
                            <option>Cash</option>
                            <option>Credit Card</option>
                            <option>Debit Card</option>
                            <option>Internet Banking</option>
form
                        </select>

                    </div>

                </div>
                <div class="row" style="margin: 2% 0% 2% 0%">
                <input type="submit" name="enrollCourse" value="Enroll Now" class="btn btn-primary">

                </div>


            </form>

        </div>
    <div>

    </div>
    </div>
    <?php include('inc/footer.php')?>
    <?php }
?>