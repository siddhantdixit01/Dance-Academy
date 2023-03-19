<?php include('config/db.php');?>
<?php session_start();?>
<?php
    $student_user_id = $_SESSION['student_user_id'];
    if(!isset($student_user_id)){
        header('location:login.php');
    }
    if(isset($_POST['submitFeedback'])){

        $user_id =  $_SESSION['student_user_id'];
        $role_id = $_SESSION['student_role_id'];
        $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);
        $sql = "INSERT INTO tbl_feedback(feedback, user_id, user_role_id) 
        VALUES('$feedback' , '$user_id' , '$role_id')";
        if(mysqli_query($conn, $sql)){
            echo 'Feedback submitted successfully.';
        }
        else{
            echo 'Failed to submit feedback!';
        }
        
    }

?>
<?php include('inc/header.php');?>
    <div class="container">
        <div class="col-md-3">
            <?php include('sidebar/studentSidebar.php');?>
        </div>
        <div class="col-md-9">
            <h3>FEEDBACK</h3>
            <form method="post" action="feedback.php" >
                <div class="box">
                    <div class="row" style="padding: 0px 30px; margin-bottom: 10px;">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Enter Feedback</label>
                                <textarea class="form-control" name="feedback" cols="40" 
                                rows="5" placeholder="Feedback"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding: 0px 30px;">
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="submit" name="submitFeedback" 
                                value="Submit" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php include('inc/footer.php');?>