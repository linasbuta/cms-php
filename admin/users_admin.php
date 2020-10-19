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
                            Wellkom zu Users
                            <small>Author</small>
                        </h1>

                    
                        <?php

                        if(isset($_GET['users'])){
                            $source = $_GET['users'];
                        }else{
                            $source = "";
                        }

                        switch ($source) {
                            case 'add_user':
                                include ("include/add_user.php");
                                break;
                            case 'edit_user':
                                include("include/edit_user.php");
                                break;


                            default:
                                include ("include/view_all_users.php");
                                break;
                        }



                        ?>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

    </div>


    <!-- /#page-wrapper -->

<?php include("include/footer_admin.php");?>