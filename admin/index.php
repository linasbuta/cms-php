<?php include ("include/header_admin.php");?>

    <div id="wrapper">

        <!-- Navigation -->
      <?php include ("include/navigation_admin.php");?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Wellkom zu admin
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->

<!--Widgets section-->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>


                                    <div class="col-xs-9 text-right">
                                    <?php
                                    $sql = "SELECT * FROM posts";
                                    $query = mysqli_query($connection, $sql);

                                  $post_count = mysqli_num_rows($query);
                                  echo " <div class='huge'>{$post_count}</div>";

                                    ?>



                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./post_admin.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>

                                    <div class="col-xs-9 text-right">

                                        <?php
                                        $sql = "SELECT * FROM comments";
                                        $query = mysqli_query($connection, $sql);

                                        $comments_count = mysqli_num_rows($query);
                                        echo " <div class='huge'>{$comments_count}</div>";

                                        ?>

                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>


                                    <div class="col-xs-9 text-right">

                                        <?php
                                        $sql = "SELECT * FROM users";
                                        $query = mysqli_query($connection, $sql);

                                        $user_count = mysqli_num_rows($query);
                                        echo " <div class='huge'>{$user_count}</div>";

                                        ?>

                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users_admin.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>


                                    <div class="col-xs-9 text-right">
                                        <?php
                                        $sql = "SELECT * FROM categories";
                                        $query = mysqli_query($connection, $sql);

                                        $category_count = mysqli_num_rows($query);
                                        echo " <div class='huge'>{$category_count}</div>";

                                        ?>

                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories_admin.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

<?php

       
        $sqls = "SELECT * FROM posts WHERE post_status = 'published' ";
        $query_published_post = mysqli_query($connection, $sqls);

        $post_published_count = mysqli_num_rows($query_published_post);


        $sqls = "SELECT * FROM posts WHERE post_status = 'draft' ";
        $query_draft_post = mysqli_query($connection, $sqls);

        $post_draft_count = mysqli_num_rows($query_draft_post);


        $sqlss = "SELECT * FROM comments WHERE comment_status = 'unapproved' ";
        $query_comment_post = mysqli_query($connection, $sqlss);

        $comment_unapproved_count = mysqli_num_rows($query_comment_post);


        $sqlsss = "SELECT * FROM users WHERE user_role = 'subscriber' ";
        $query_subscriber_user = mysqli_query($connection, $sqlsss);

        $user_subscriber_count = mysqli_num_rows($query_subscriber_user);
?>
            
                <div class="row">

                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Data', 'Count'],

                                <?php
                                $element_text =['All post', 'Published post', 'Draft post', 'Comment', 'unapproved comment', 'Users', 'Subscriber users', 'Categories'];
                                $element_count =[$post_count, $post_published_count, $post_draft_count, $comments_count, $comment_unapproved_count, $user_count, $user_subscriber_count, $category_count, ];

                                for ($i =0; $i < 8; $i++){
                                    echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                                }

                                ?>



                                //['Posts', 1000],

                            ]);

                            var options = {
                                chart: {
                                    title: '',
                                    subtitle: '',
                                }
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                    </script>

                    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>



                </div>


            </div>
            <!-- /.container-fluid -->

        </div>

   <?php include ("include/footer_admin.php");?>