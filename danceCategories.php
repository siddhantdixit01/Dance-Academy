<?php include('config/db.php');?>
<?php session_start();?>
<?php
    $admin_user_id = $_SESSION['admin_user_id'];
    if(!isset($admin_user_id)){
        header('location:login.php');
    }
	if(isset($_POST['danceCategories'])){
		$category_name=mysqli_real_escape_string($conn,$_POST['category_name']);
		$tag_name=mysqli_real_escape_string($conn,$_POST['tag_name']);
		$image=$_FILES['category_image']['name'];
		$image_size=$_FILES['category_image']['size'];
		$tmp_name=$_FILES['category_image']['tmp_name'];
		$img_path='uplaods/categories/'.$image;
	if (!empty($image)) {
		if ($image_size>2000000) {
			$message[]='image file size is too large';
		}
		else {
			$insertCategory="INSERT INTO tbl_dance_categories(category_name,tag_name,category_image) VALUES
			('$category_name','$tag_name','$img_path')";
			mysqli_query($conn,$insertCategory);
			move_uploaded_file($tmp_name,$img_path);
			header('location:danceCategories.php');
		}
	}
}
?>
<?php include('inc/header.php');?>
    <div class="container">
        <div class="col-md-3">
            <?php include('sidebar/adminSidebar.php');?>
        </div>
        <div class="col-md-9" style="">
            <div class="row" style="margin-left:1px;margin-top:18px;">
                <a href="" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                    Add Category
                </a>
            </div>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Tag</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sql="SELECT * FROM tbl_dance_categories";
                        $getCategories=mysqli_query($conn,$sql); 
                        if(mysqli_num_rows($getCategories)>0){
                            while ($row=mysqli_fetch_assoc($getCategories)) {
                    ?>
                                <tr>
                                    <td style="width:5%;font-size:14px;">
                                        <?php echo $row['category_id'];?>
                                    </td>
                                    <td style="width:35%;font-size:14px;">
                                        <?php echo $row['category_name'];?>
                                    </td>
                                    <td style="width:5%;font-size:14px;">
                                        <?php echo $row['tag_name'];?>
                                    </td>
                                    <td style="width:5%;font-size:14px;" class="image">
                                        <img src="<?php echo $row['category_image'];?>" alt="Dance" 
                                        style="width:30%;">
                                    </td>
                                    <td style="width:25%;" class="actions">
                                        <a href="" class="btn-sm btn-primary editCategory" 
                                        data-val=<?php echo $row['category_id'];?> data-toggle="modal" data-target="#editCategory">
                                            <i class="fa fa-edit"></i>Edit
                                        </a>
                                        <a href="" class="btn-sm btn-danger editCategory" 
                                        data-val=<?php echo $row['category_id'];?>>
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
                                <td>No categories added yet!</td>
                            </tr>
                    <?php        
                        } 
                    ?>
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labledby="exampleModalLabel"
        aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h5 class="modal-title" id="exampleModalLabel">Add Dance Category</h5>
					</div>
					<form method="post "action="danceCategories.php" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="form-group">
								<label>Category</label>
								<input type="text" name="category_name" class="form-control" required="" 
								placeholder="Category">
							</div>
							<div class="form-group">
								<label>Tag Name</label>
								<input type="text" name="tag_name" class="form-control" required="" 
								placeholder="Tag Name">
							</div>
							<div class="form-group">
								<label>Upload Image</label>
								<input type="file" name="category_image" class="form-control" required="" >
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal"
							onclick="location.reload();">Close</button>
							<input type="submit" name="danceCategories" value="Save Changes" class="btn btn-primary">
						</div>
					</form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Edit Dance Category
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" 
                            onClick="window.location.reload();">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
	<script>
		$('.nav-<?php echo isset($_GET['page']) ? $_GET['page']:'' ?>').addClass('active')
	</script>
<?php include('inc/footer.php');?>