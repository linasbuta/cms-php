<?php include ("includes/header.php");?>
    <!-- Navigation -->
<?php include ("includes/navigation.php");?>
    <!-- Page Content -->

    <div class="container">

        <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
               Post
                <small>One Post</small>
            </h1>

<?php

// Comment 
    if(isset($_POST['creat_comment'])){
        $p_id = $_GET['p_id'];
        $comment_author = $_POST['comment_author'];
        $comment_email = $_POST['comment_email'];
        $comment_content = $_POST['comment_content'];
        global $connection;
        $sql = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
        $sql.= "VALUES( $p_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved',
        now())";
        $result = mysqli_query($connection, $sql);
        if(!$result){
            die("Query failed" . mysqli_error($connection));
        }

        $sqls ="UPDATE posts SET post_comment_count = post_comment_count + 1 ";
        $sqls .="WHERE post_id = $p_id ";

        $result = mysqli_query($connection, $sqls);
    }


?>

            <!-- First Blog Post -->
            <?php only_post_display(); ?>
            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="" method="post" role="form">

                    <div class="form-group">
                        <label for="Author">Author</label>
                       <input type="text" name="comment_author" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" name="comment_email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="comment">Your comment</label>
                        <textarea class="form-control" rows="3" name="comment_content" required></textarea>
                    </div>
                    <button type="submit" name="creat_comment" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->

<?php
    
    $p_id = $_GET['p_id'];
        $query = "SELECT * FROM comments WHERE comment_post_id = {$p_id} ";
        $query .= "AND comment_status = 'approved' ";
        $query .= "ORDER BY comment_id DESC ";

        $select_comment_query = mysqli_query($connection, $query);
            if(!$select_comment_query) {

                die('Query Failed' . mysqli_error($connection));
            }
                while ($row = mysqli_fetch_array($select_comment_query)) {
                $comment_date   = $row['comment_date'];
                $comment_content= $row['comment_content'];
                $comment_author = $row['comment_author'];
                ?>

            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $comment_author ;?>
                        <small><?php echo $comment_date ;?></small>
                    </h4>
                    <?php echo $comment_content ;?>
                </div>
            </div>


<?php } ?>


        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php  include ("includes/sidebar.php");?>
    </div>
    <!-- /.row -->

    <hr>
<?php include ("includes/footer.php");?>