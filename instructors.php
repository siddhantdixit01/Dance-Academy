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
        <h2>INSTRUCTIONS</h2>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col" style="width: 10%;">Image</th>
                    <th scope="col" style="width: 25%;">Instructor Name</th>
                    <th scope="col" style="width: 10%;">Age</th>
                    <th scope="col" style="width: 10%;">Gender</th>
                    <th scope="col" style="width: 10%;">Experience</th>
                    <th scope="col" style="width: 10%;">Address</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = " SELECT * FROM tbl_instructors";
                $instructors = mysqli_query($conn, $sql);
                if(mysqli_num_rows($instructors) > 0){
                    while($row = mysqli_fetch_assoc($instructors)){
                        ?>
                    <tr>
                        <td style="width: 10%;" class="image">
                        <?php
                        if($row["instructor_image"] == null){
                            ?>
                               <p style="text-align: center; border-radius: 50%;">
                            <img src="assets/img/avatar.jpg" style="width: 50%"></p>
                            <?php
                        }
                        else{
                        ?>
                            <p style="text-align: center;">
                                <img src= <?php echo $row['instructor_image'];?>
                                style="width: 50%; border-radius: 50%;">

                            </p>

                        <?php

                        }
                        ?>

                        </td>
                        <td style="width: 25%; font-size: 14px;"><?php echo $row['instructor_name'];?>
                        <td style="width: 10%; font-size: 14px;"><?php echo $row['age'];?>
                        <td style="width: 10%; font-size: 14px;"><?php echo $row['gender'];?>
                        <td style="width: 10%; font-size: 14px;"><?php echo $row['experience'];?>
                        <td style="width: 30%; font-size: 14px;"><?php echo $row['address'];?>


                        </td>

                    </tr>
                   <?php }

                }

                else{
                    ?>
                    <tr>
                        <td colspan="50px">No instructors registered yet!</td>
                    </tr>
                    <?php

                }
                ?>

            </tbody>

        </table>

    </div>

</div>
<script>
		$('.nav-<?php echo isset($_GET['page']) ? $_GET['page']:'' ?>').addClass('active')
	</script>
<?php include('inc/footer.php');?>