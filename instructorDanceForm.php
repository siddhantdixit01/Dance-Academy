<?php 
include('config/db.php');
session_start();
    if(!isset($_SESSION['admin_user_id'])&&!isset($_SESSION['instructor_user_id'])){
        header('location:login.php');
    }
    if(isset($_POST['addDance'])){
        $role_id=$_SESSION['instructor_role_id'];
        $user_id=$_SESSION['instructor_user_id'];
        $dance_id = mysqli_real_escape_string($conn, $_POST['dance_id']);
        $sql="SELECT dance_name FROM tbl_dance_forms WHERE dance_id='$dance_id'";
        $result=mysqli_fetch_assoc(mysqli_query($conn,$sql)) ;
        $dance_name=$result['dance_name'];
        $insertDance = "INSERT INTO tbl_instructor_dance_forms(instructor_role_id,user_id,dance_name,dance_id) 
            VALUES('$role_id', '$user_id', '$dance_name', '$dance_id')";
        mysqli_query($conn, $insertDance);
    }
?>
<?php include('inc/header.php');?>
    <div class="container">
        <div class="col-md-3">
            <?php 
                include('sidebar/instructorSidebar.php');
            ?>
        </div>
        <div class="col-md-9">
            <div class="row" style="margin-left:1px;margin-top:18px;">
                <a href="" class="btn btn-info" data-toggle="modal" data-target="#addDance">
                    Add Dance Forms
                </a>
            </div>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Dance ID</th>
                        <th scope="col">Dance Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $role=$_SESSION['instructor_user_id'];
                        $sql1="SELECT * FROM tbl_instructor_dance_forms WHERE user_id='$role'";
                        $getDances=mysqli_query($conn,$sql1);
                        if(mysqli_num_rows($getDances)>0){
                            while ($row=mysqli_fetch_assoc($getDances)) {
                    ?>
                                <tr>
                                    <td style="width:20%;font-size:14px;">
                                        <?php echo $row['dance_id'];?>
                                    </td>
                                    <td style="width:20%;font-size:14px;">
                                        <?php echo $row['dance_name'];?>
                                    </td>
                                    <td style="width:25%;" class="actions">
                                        <a href="" class="btn-sm btn-danger deleteDance" 
                                        data-val=<?php echo $row['dance_id'];?>>
                                            <i class="fa fa-trash"></i>Delete
                                        </a>
                                    </td>
                                </tr>
                    <?php            
                            }
                        }   
                        else {
                    ?>
                            <tr>
                                <td>No dance form added yet!</td>
                            </tr>
                    <?php        
                        } 
                    ?>
                </tbody>
            </table>

            <div class="modal fade" id="addDance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Dance Form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="instructorDanceForm.php" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Select Dance Form</label>
                                    <select name="dance_id" class="form-control">
                                        <option value="">Select</option>
                                        <?php 
                                            $sql="SELECT * FROM tbl_dance_forms";
                                            $getCategories=mysqli_query($conn,$sql);
                                            if(mysqli_num_rows($getCategories)>0){
                                                while ($fetch_rows=mysqli_fetch_assoc($getCategories)) {
                                        ?>
                                                    <option value=<?php echo $fetch_rows['dance_id'];?>>
                                                        <?php echo $fetch_rows['dance_name'];?>
                                                    </option>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                onclick="location.reload();">Close</button>
                                <input type="submit" name="addDance" value="Save Dance Form" 
                                class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>  
            </div>
        </div>
    </div>
	<script>
		$('.nav-<?php echo isset($_GET['page']) ? $_GET['page']:'' ?>').addClass('active')
	</script>
<?php include('inc/footer.php');?>
<script type="text/javascript">
    $('.deleteDance').click(function(){
        var id=$(this).attr('data-val');
        $.ajax({
            url:"deleteInstructorDance.php",
            type:"POST",
            data:{
                type:1,
                id:id,
            },
            cache:false,
            success:function(data){
                alert(data);
            }
        });
    })
</script>