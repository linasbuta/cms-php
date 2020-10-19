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
                           
                           </h1>

            <!--Add form start-->

                <div class="col-xs-3">  
                <?php add_categories_admin();?>                
            <form action="" method="post">
                
                <div class="form-group">
                    <label for="cat_title">Category title</label>
                    <input class="form-control" type="text" name="cat_title" >
                </div>
                <div class="form-group">

                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                </div>
            </form>
            <!--Add form end-->


            <!--Edit update form start-->
                            
            <form action="" method="post">
                <?php edit_admin_category(); ?>
                
                <?php update();?>
            </form>
            </div><!--Edit update form end-->

            <!-- table categories start-->
            <div class="col-xs-9">                  
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category Title</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php categories_dispaly_admin();?>
                        <?php delete_categories_admin(); ?>
                    </tbody>
                </table>
            </div><!-- table categories end-->


                    </div>
                </div>
                

            </div>
            

    </div>


        <!-- /#page-wrapper -->

   <?php include ("include/footer_admin.php");?>