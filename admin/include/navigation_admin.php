<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">CMS Admin</a>
    </div>





    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li><a href="../index.php">Home</a></li>




        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php
                if(isset($_SESSION['username'])){
                echo $_SESSION['username']; }?> <b class="caret"></b></a>


            <ul class="dropdown-menu">
           

                <li class="divider"></li>
                <li>
                    <a href="include/session_destroy.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>



    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">


            <li>
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#posts"><i class="fa fa-fw fa-arrows-v"></i> Post <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="posts" class="collapse">
                    <li>
                        <a href="post_admin.php">View all posts</a>
                    </li>
                    <li>
                        <a href="post_admin.php?source=add_post">Add post</a>
                    </li>
                    <li>
                        <a href="post_admin.php?source=edit_all_post_adminas">Edit post</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="categories_admin.php"><i class="fa fa-fw fa-bar-chart-o"></i> Categories Page</a>
            </li>
            <li>
                <a href="comments.php"><i class="fa fa-fw fa-table"></i> Comments</a>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="users_admin.php">View All USERS</a>
                    </li>
                    <li>
                        <a href="users_admin.php?users=add_user">Add USER</a>
                    </li>
                </ul>
            </li>
           




        </ul>


    </div>
    <!-- /.navbar-collapse -->
</nav>
