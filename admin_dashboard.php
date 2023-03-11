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
            <h1>Admin Sidebar</h1>

        </div>
        <div class="col-md-9">
            <h1 style="text-transform: uppercse;">Admin Dashboard</h1>

        </div>

    </div>

<?php include('inc/header.php');?>