<?php include ("includes/header.php");?>
    <!-- Navigation -->
<?php include ("includes/navigation.php");?>
    <!-- Page Content -->

    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Post Author
                    <small>All Posts</small>
                </h1>

                
                <?php author_post_display(); ?>
            
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <?php  include ("includes/sidebar.php");?>
        </div>
        <!-- /.row -->

    <hr>
<?php include ("includes/footer.php");?>