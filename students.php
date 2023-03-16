<?php include('config/db.php');?>
<?php session_start();?>
<?php
    $admin_user_id = $_SESSION['admin_user_id'];
    if(!isset($admin_user_id)){
        header('location:login.php');
    }

?>
<?php include('inc/header.php');?>
<div class= "container">
    <div class= "col-md-3">
        <?php include('sidebar/adminSidebar.php');?>
    </div>
    <div class="col-md-9">
        <h2>STUDENTS</h2>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col" style="width: 10%;">Image</th>
                    <th scope="col" style="width: 25%;">Student Name</th>
                    <th scope="col" style="width: 10%;">Age</th>
                    <th scope="col" style="width: 10%;">Gender</th>
                    <th scope="col" style="width: 55%;">Address</th>
                </tr>


            </thead>
            <tbody>
                <?php
                $sql= "SELECT * FROM tbl_students";
                $students = mysqli_query($conn, $sql);
                if(mysqli_num_rows($students) > 0){
                    while($row = mysqli_fetch_assoc($students)){
                        ?>
                        <tr>
                            <td style="width: 10%;" class="image">
                            <?php
                                if($row["student_image"] == null){
                                    ?>
                                    <p style="text-align:center;"> <img src="assets/img/avatar.jpg" style="width: 50%; border-radius: 50%;"> </p>

                                    <?php
                                }
                                else{
                                ?>
                                <p style="text-align:center;"> <img src=<?php echo $row['student_image'];?> style="width: 50%; border-radius: 50%;"> </p>

                                <?php
                                }
                                ?>

                            </td>
                            <td style="width:25% ; font-size: 14px;"><?php echo $row['student_name'];?></td>
                            <td style="width:10% ; font-size: 14px;"><?php echo $row['age'];?></td>
                            <td style="width:10% ; font-size: 14px;"><?php echo $row['gender'];?></td>
                            <td style="width:30% ; font-size: 14px;"><?php echo $row['address'];?></td>

                        </tr>
                   <?php }
                }
                else{
                    ?>
                    <tr>
                        <td colspan="100px">No students registered yet!</td>
                    </tr>
                    <?php
                }?>
            </tbody>

        </table>

    </div>


</div>
                
<script>
        $('.nav-<?php echo isset($_GET['page'])?$_GET['page']:'' ?>').addClass('active')
    </script>
<?php include('inc/footer.php');?>
