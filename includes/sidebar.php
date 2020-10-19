    <div class="col-md-4">

        <!-- Blog Search Well -->
        <div class="well">

            <h4>Blog Search</h4>
            <form action="search.php" method="post">
                <div class="input-group">
                    <input name="search" type="text" class="form-control">
                    <span class="input-group-btn">

                        <button name="submit" class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form><!--search form-->
                    <!-- /.input-group -->
        </div>

        <!-- Login form -->
        <div class="well">

            <h4>Login</h4>
            <form action="includes/login.php" method="post">
                <div class="form-group">
                    <input name="user_name" type="text" class="form-control" placeholder="Enter username">

                </div>
                <div class="input-group">
                    <input name="user_password" type="password" class="form-control" placeholder="Enter password">
                    <span class="input-group-btn">
                     <button class="btn btn-primary" name="login" type="submit">Login</button>
                    </span>
                </div>

            </form><!--search form-->
            <!-- /.input-group -->
        </div>

        <!-- Blog Categories Well -->
        <div class="well">
            <h4>Blog Categories</h4>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled">
                    <?php side_categories();?>
                    </ul>
                </div>
                
            </div>
            <!-- /.row -->

        </div>

        <!-- Side Widget Well -->
        <?php include ("widget.php");?>

    </div>
