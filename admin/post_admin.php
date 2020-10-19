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
                            Wellkom zu Post
                           
                           </h1>
                     
                  <?php 
                      if(isset($_GET['source'])){
                        $source = $_GET['source'];
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
                          case 'edit_all_post_adminas':
                              include ("include/edit_all_post_admin.php");
                              break;
                        
                        default:
                          include ("include/all_view_post_admin.php");
                          break;
                      }



                  ?>
    
                </div>
             </div>
               

        </div>
           

    </div>

   <?php include ("include/footer_admin.php");?>