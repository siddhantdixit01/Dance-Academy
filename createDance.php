<?php 
include('config/db.php');
session_start();
    $admin_user_id = $_SESSION['admin_user_id'];
    if(!isset($admin_user_id)){
        header('location:login.php');
    }
    if(isset($_POST['addDance'])){
        $dance_name = mysqli_real_escape_string($conn, $_POST['dance_name']);
        $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $image= $_FILES['dance_image']['name'];
        $image_size= $_FILES['dance_image']['size'];
        $tmp_name= $_FILES['dance_image']['tmp_name'];
        $img_path= 'uploads/dance/'.$image;
        if(!empty($image)){
            if($image_size > 2000000){
                $message[] = 'image file size is too large';
                
            }else{
                $insertDance = "INSERT INTO tbl_dance_forms(dance_name, category_id, price, dance_image) 
                VALUES('$dance_name', '$category_id', '$price', '$img_path')";
                  mysqli_query($conn, $insertDance);
                  move_uploaded_file($tmp_name, $img_path);
                  header('location:createDance.php');

            }
        }
    }
    if (isset($_POST['updateDance'])) {
        $dance_id=mysqli_real_escape_string($conn,$_POST['dance_id']);
        $dance_name=mysqli_real_escape_string($conn,$_POST['dance_name']);
        $category_id=mysqli_real_escape_string($conn,$_POST['category_id']);
        $price=mysqli_real_escape_string($conn,$_POST['price']);
        $image= $_FILES['dance_image']['name'];
        $image_size= $_FILES['dance_image']['size'];
        $tmp_name= $_FILES['dance_image']['tmp_name'];
        $img_path= 'uploads/dance/'.$image;
        if(!empty($image)){
            if($image_size > 2000000){
                $message[] = 'image file size is too large';
                
            }else{
                $updateDance = "UPDATE tbl_dance_forms SET dance_name='$dance_name', category_id='$category_id',
                 price='$price', dance_image='$image_path' WHERE dance_id='$dance_id'";
                  mysqli_query($conn, $updateDance);
                  move_uploaded_file($tmp_name, $img_path);
                  header('location:createDance.php');

            }
        }
    }
?>
<?php include('inc/header.php');?>
    <div class="container">
        <div class="col-md-3">
            <?php include('sidebar/adminSidebar.php');?>
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
                        <th scope="col">Dance Name</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Acton</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql="SELECT * FROM tbl_dance_forms JOIN tbl_dance_categories ON
                        tbl_dance_categories.category_id=tbl_dance_forms.category_id";
                        $getDances=mysqli_query($conn,$sql);
                        if(mysqli_num_rows($getDances)>0){
                            while ($row=mysqli_fetch_assoc($getDances)) {
                    ?>
                                <tr>
                                    <td style="width:20%;font-size:14px;">
                                        <?php echo $row['dance_name'];?>
                                    </td>
                                    <td style="width:20%;font-size:14px;">
                                        <?php echo $row['category_name'];?>
                                    </td>
                                    <td style="width:10%;font-size:14px;">
                                        <?php echo $row['price'];?>
                                    </td>
                                    <td style="width:10%;font-size:14px;" class="image">
                                        <img src=<?php echo $row['dance_image'];?> alt="Dance" 
                                        style="width:30%;">
                                    </td>
                                    <td style="width:25%;" class="actions">
                                        <a href="" class="btn-sm btn-primary editDance" 
                                        data-val=<?php echo $row['dance_id'];?> data-toggle="modal" 
                                        data-target="#editDance">
                                            <i class="fa fa-edit"></i>Edit
                                        </a>
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
                                <td>No dance added yet!</td>
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
                        <form method="post" action="createDance.php" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Enter Dance Form</label>
                                    <input type="text" name="dance_name" class="form-control" required="" 
                                    placeholder="Dance Form">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Select</option>
                                        <?php 
                                            $sql="SELECT * FROM tbl_dance_categories";
                                            $getCategories=mysqli_query($conn,$sql);
                                            if(mysqli_num_rows($getCategories)>0){
                                                while ($fetch_rows=mysqli_fetch_assoc($getCategories)) {
                                        ?>
                                                    <option value=<?php echo $fetch_rows['category_id'];?>>
                                                        <?php echo $fetch_rows['category_name'];?>
                                                    </option>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Enter Price</label>
                                    <input type="text" name="price" class="form-control" required="" 
                                    placeholder="Price">
                                </div>
                                <div class="form-group">
                                    <label>Upload Image</label>
                                    <input type="file" name="dance_image" class="form-control" required="" 
                                    accept="image/jpg, image/png, image/jpeg">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                onclick="location.reload();">Close</button>
                                <input type="submit" name="addDance" value="Save Changes" 
                                class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>  
            </div>
            <div class="modal fade" id="editDance" tabindex=-1 role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Dance Form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            onclick="window.location.reload();">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="createDance.php" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Dance Form</label>
                                        <input type="text" name="dance_name" id="dance_name" 
                                        class="form-control" required="" placeholder="Dance Form">
                                    </div>
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="hidden" name="category_id">
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="">Select</option>
                                            <?php 
                                                $sql="SELECT * FROM tbl_dance_categories";
                                                $getCategories=mysqli_query($conn,$sql);
                                                if(mysqli_num_rows($getCategories)>0){
                                                    while ($fetch_rows=mysqli_fetch_assoc($getCategories)) {
                                            ?>
                                                        <option value=<?php echo $fetch_rows['category_id'];?>>
                                                            <?php echo $fetch_rows['category_name'];?>
                                                        </option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label> Price</label>
                                        <input type="text" name="price" id="price" class="form-control" required="" 
                                        placeholder="Price">
                                    </div>
                                    <div class="form-group">
                                        <div id="dance_image"></div>
                                        <label>Upload Image</label>
                                        <input type="file" name="dance_image" class="form-control" required="" 
                                        accept="image/jpg, image/png, image/jpeg">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    onclick="window.location.reload();">Close</button>
                                    <input type="submit" name="updateDance" value="Update Changes" 
                                    class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script>
		$('.nav-<?php echo isset($_GET['page']) ? $_GET['page']:'' ?>').addClass('active')
	</script>
<?php include('inc/footer.php');?>
<script>
    $('.editDance').click(function(){
        var id=$(this).attr('data-val');
        $.ajax({
            url: "updateDance.php",
            type: "POST",
            data: {
                type:1,
                id=id,
            },
            cache: false,
            success: function(data){
                var jsonData=$.parseJSON(data);
                #('#dance_id').val(jsonData.dance_id);
                #('#category_id').val(jsonData.category_id);
                #('#dance_name').val(jsonData.dance_name);
                #('#price').val(jsonData.price);
                #('#dance_image').append('<img src="'+jsonData.dance_image+'">');
            }
        });
    })
    $('.deleteDance').click(function(){
        var id=$(this).attr('data-val');
        $.ajax({
            url:"deleteDance.php",
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