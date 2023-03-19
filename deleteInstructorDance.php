<?php
    include('config/db.php');
    session_start();
    $dance_id=$_POST['id'];
    $sql="DELETE FROM tbl_instructor_dance_forms WHERE dance_id='$dance_id'";
        if (mysqli_query($conn,$sql)) {
            echo 'Dance deleted successfully.';
        }
?>