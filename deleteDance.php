<?php
    include('config/db.php');
    session_start();
    $dance_id=$_POST['id'];
    $getURL="SELECT dance_image FROM tbl_dance_forms WHERE dance_id='$dance_id'";
    $result=mysqli_query($conn,$getURL);
    if(mysqli_num_rows($result)>0){
        while ($row=mysqli_fetch_assoc($result)) {
            $img=$row['dance_image'];
        }
        $sql="DELETE FROM tbl_dance_forms WHERE dance_id='$dance_id'";
        unlink($img);
        if (mysqli_query($conn,$sql)) {
            echo 'Dance deleted successfully.';
        }
    }
?>