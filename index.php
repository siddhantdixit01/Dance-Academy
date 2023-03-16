<?php include('inc/header.php');?>
    <div class="container" style="width:100%">
        <div id="myCarousel" class="carousel slide" data-ride="carousel" >
            <ol class="carousel-indicators" >
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active" >
                    <img src="assets/img/banner-1.jpg" alt="Banner-1">
                    <div class="carousel-caption">
                        <h3 style="font-size:45px;">Welcome to Dance Academy</h3>
                        <p style="font-size:20px;">Dance Dance Dance</p>
                    </div>
                </div>
                <div class="item" >
                    <img src="assets/img/banner-2.jpg" alt="Banner-2">
                    <div class="carousel-caption">
                        <h3 style="font-size:45px;">Support</h3>
                        <p style="font-size:20px;">Dance Dance Dance</p>
                    </div>
                </div>
                <div class="item" >
                    <img src="assets/img/banner-3.jpg" alt="Banner-3">
                    <div class="carousel-caption">
                        <h3 style="font-size:45px;">Talented Instructors</h3>
                        <p style="font-size:20px;">Dance Dance Dance</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <div class="row">
            <h2 style="text-align: center; margin-top: 30px;">DANCE CATEGORIES</h2>
        </div>
        <div class="row">
            <div class="logo-slider">
              <?php
              include('config/db.php');
              $sql = "SELECT * FROM tbl_dance_categories";
              $getCategories = mysqli_query($conn, $sql);
                if(mysqli_num_rows($getCategories) > 0){
                    while($row = mysqli_fetch_assoc($getCategories)){
                        $category_id = $row['category_id'];
                        ?>
                        <div class="col-md-4" style="margin-top: 10px;">
                            <div class="category-box">
                                <img src=<?php echo $row['category_image'];?> style="width: 85%;
                                    margin-left: 14px;" alt="Dance">
                                    <?php if($row["tag_name"] != null):?>
                                        <div class="trend"><?php echo $row['tag_name'];?></div>
                                        <?php else:?>
                                        <?php endif;?>
                                        <div class="category_name">
                                         <span style=""><?php echo $row['category_name'];?></span>
                                        </div>
                                        <a href="viewDanceForms.php?id=<?php echo $category_id;?>" class="btn btn-warning" style="background: #922bc0; border-color: #922bc0;">View Dance Forms</a>


                            </div>
                        </div>

                   <?php }

                }

             ?>
            </div>

        </div>

    </div>
    
    <div class="container" style="background: #F7F7F7; margin-top: 30px; padding-bottom: 30px;">
    <div class="wrapper">
        <div class="row">
        <h2 style="text-align: center; margin-top: 30px;">POPULAR / TRENDING</h2>
            
    </div>
    <div class="row">
        <div class="logo-slider">
            <?php
            include('config/db.php');
            $sql= "SELECT tbl_dance_forms.dance_id, tbl_dance_forms.dance_image,
            tbl_dance_forms.dance_name, tbl_dance_categories.category_name
            FROM tbl_dance_forms
            JOIN tbl_dance_categories ON tbl_dance_categories.category_id = tbl_dance_forms.category_id
            WHERE tbl_dance_forms.tag_name = 'Popular'";
            $getDance = mysqli_query($conn, $sql);
                 if(mysqli_num_rows($getDance) > 0){
                    while($row = mysqli_fetch_assoc($getDance)){
                     ?>
                    <div class="col-md-4" style="margin-top: 10px;">
                        <div class="category-box">
                            <img src=<?php echo $row['dance_image'];?> style="width:85%; margin-left: 14px;"  alt="">
                            <div class="category_name">
                            <span style=""><?php echo $row['dance_name'];?></span>
                            </div>

                            <a href="enroll.php?did=<?php echo $row['dance_id'];?>"
                        class="btn btn-warning" style="background: #922bc0;
                        border-color: #922bc0;"> Enroll Now</a>
                        

                        </div>

                    </div>


                    <?php }
                    
                
                    
                 }

         ?>
        </div>

    </div>

    </div>

    </div>

<?php include('inc/footer.php')?>