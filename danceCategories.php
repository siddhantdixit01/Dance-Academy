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
            
        </div>
    </div>
<?php include('inc/footer.php');?>