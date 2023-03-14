<?php include('inc/header.php');?>
<div class="container" style="padding: 0px;">
    <img src="assets/img/staff.jpg" alt="">
</div>
<div class="row">
    <h2 style="text-align: center;">STAFF & INSTRUCTORS</h2>

</div>
<div class="row">
    <div class="wrapper">
        <?php
        include('config/db.php');
        $sql= "SELECT * FROM tbl_instructors";
        $getInstructors = mysqli_query($conn,$sql);
        if(mysqli_num_rows($getInstructors)> 0){
            while($row = mysqli_fetch_assoc($getInstructors)){
                $category_id = $row['category_id'];
                ?>
                <div class="col-md-4" style="margin-top: 10px;">
                 <div class="category-box">
                    <img src=<?php echo $row['instructor_image'];?> style="width:50%; margin:0 auto; border-radius: 50%;" alt="Dance">
                   <div class="category_name" style="background: #922bc0;">
                    <span style="display: block; color: #FFF;"><?php echo $row['instructor_name'];?>
                    </span>
                    <span style="color: #FFF;">Experience: <?php echo $row['experience'];?> Years
                    </span>

                   </div>
                  
                 </div>

                </div>
                <?php
            }
        }


    ?>
    </div>

</div>
    
<?php include('inc/footer.php');?>