<?php
    include('config/db.php');
    session_start();
    $dance_id=$_POST['id'];
    $sql="SELECT * FROM tbl_dance_forms JOIN tbl_dance_categories ON 
    tbl_dance_categories.categor_id=tbl_dance_forms.category_id WHERE dance_id='$dancee_id'";
    $updateDance=mysqli_query($conn,$sql);
    if(mysqli_num_rows($updateDance)>0){
        while($row=mysqli_fetch_assoc($updateDance)){
            $data=array(
                'dance_id' => $row['dance_id'],
                'category_id' => $row['category_id'],
                'dance_name' => $row['dance_name'],
                'category_name' => $row['category_name'],
                'price' => $row['price'],
                'dance_image' => $row['dance_image'],
            );
        }
        echo json_encode($data);
    }
?>