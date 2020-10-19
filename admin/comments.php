<?php include("include/header_admin.php");?>

    <div id="wrapper">

    <!-- Navigation -->
    <?php include("include/navigation_admin.php");?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Wellkom zu Comments
                        <small>Author</small>
                    </h1>

                    <?php

                    if(isset($_GET['comments'])){
                        $source = $_GET['comments'];
                    }else{
                        $source = "";
                    }

                    switch ($source) {
                        case 'add_post':
                            include ("include/add_post_admin.php");
                            break;
                        case 'edit_post':
                            include("include/edit_post_admin.php");
                            break;
                        case 'jj':
                            # code...
                            break;

                        default:
                            include ("include/view_all_comments.php");
                            break;
                    }



                    ?>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>

<?php include("include/footer_admin.php");?>