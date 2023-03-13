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
        <div class="col=md-3">
            <?php include('sidebar/adminSidebar.php');?>
        </div>
        <div class="col=md-9" style="">
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
                        $getCategories=mysqli_query($conn,$sql); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php include('inc/footer.php');?>