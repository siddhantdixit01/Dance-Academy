<?php include('inc/header.php');?>
    <div class="container" style="padding: 0px;">
        <img src="assets/img/view-dance.jpg" alt="">
    </div>
    <div class="row">
        <?php
        include('config/db.php');
        $id = $_GET['id'];
        $sql= "SELECT category_name FROM tbl_dance_categories WHERE category_id = $id";
        $getCategory = mysqli_query($conn, $sql);
        if(mysqli_num_rows($getCategory) > 0){
            while($row = mysqli_fetch_assoc($getCategory)){?>
            <h2 style="text-align: center; margin-top: 30px; text-transform: uppercase;">
        <?php echo $row['category_name'];?></h2>

        <?php } ?>
       <?php } ?>
    </div>
    <div class="row" style="padding:15px 15px;
    width: 960px;
    margin:  0 auto;">
    <?php
        $id = $_GET['id'];
        $sql= "SELECT * FROM tbl_dance_forms WHERE category_id = $id";
        $getDanceForms = mysqli_query($conn, $sql);
        if(mysqli_num_rows($getDanceForms) > 0){
            while($row = mysqli_fetch_assoc($getDanceForms)){
            ?>
            <div class="col-md-4" style="margin-top: 10px;">
            <div class="category-box">
                <img src=<?php echo $row['dance_image'];?> style="width: 85%; 
                margin-left: 14px;" alt="Dance">
                <div class="category_name">
                    <span style=""><?php echo $row['dance_name'];?></span>
                </div>
                <a href="enroll.php?cat_id=<?php echo $row['category_id'];?>
                &did=<?php echo $row['dance_id'];?>" class="btn btn-warning"
                style="background: #922bc0;border-color: #922bc0;">Enroll Now
            </a>

            </div>

            </div>
        <?php } ?>
       <?php } ?>

    </div>

    <?php include('inc/footer.php');?>