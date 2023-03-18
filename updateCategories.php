<?php 
    include('config/db.php');
    session_start();
    $category_id=$_POST['id'];
    $sql="SELECT * FROM tbl_dance_categories WHERE category_id='$category_id'";
    $getCategories=mysqli_query($conn,$sql);
    if (mysqli_num_rows($getCategories)>0) {
        while ($row=mysqli_fetch_assoc($getCategories)) {
            $data=array(
                'category_id'=>$row['category_id'],
                'category_name'=>$row['category_name'],
                'tag_name'=>$row['tag_name'],
                'category_image'=>$row['category_image'],
            );
        }
        echo json_encode($data);
    }
?>