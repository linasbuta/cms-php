<?php include ("includes/header.php");?>
    <!-- Navigation -->
<?php include ("includes/navigation.php");?>
    <!-- Page Content -->
    <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
               Blog categories
                <small>All </small>
            </h1>



            <!-- First Blog Post -->
            <?php
            if(isset($_GET['category'])){
             $category =  $_GET['category'];
             global $connection;
             $SQL = "SELECT * FROM posts WHERE post_category_id = $category";
             $result = mysqli_query($connection, $SQL);

             while($row = mysqli_fetch_assoc($result)){

                      $post = <<<POSTS
                <h2>
                <p class="lead">
                     <a href="post.php?p_id={$row['post_id']}">{$row['post_title']}</a>
                </p>
                    
                </h2>
                <p class="lead">
                    by {$row['post_author']}
                </p>
                
                
                <p><span class="glyphicon glyphicon-time"></span> Posted on {$row['post_date']} </p>
                <hr>
                <img class="img-responsive" src="images/{$row['post_image']}" alt="">
                <hr>
                <p>{$row['post_content']}</p>
                
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
POSTS;

            echo $post;



             }


            }

             ?>

        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php  include ("includes/sidebar.php");?>
    </div>
    <!-- /.row -->

    <hr>
<?php include ("includes/footer.php");?>