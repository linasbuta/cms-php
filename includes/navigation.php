<?php require_once ("function.php");  ?>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
               
            <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">HOME</a>
            </div>




                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="registration.php">Registration</a> </li>
                       

                        <?php
                                // Tik prisijungus matosi
                            if (session_status() === PHP_SESSION_NONE) session_start();
                            if(isset($_SESSION['user_role'])){

                                echo " <li>
                                            <a href=\"admin\">Admin</a>
                                        </li>";

                            }

                        ?>



                        <?php
                            //matomas linkas jei sesijoeaesam
                            if (session_status() === PHP_SESSION_NONE) session_start();
                            if(isset($_SESSION['user_role'])){
                                if(isset($_GET['p_id'])) {
                                    $user_id = $_GET['p_id'];
                                    echo "<li>
                                                <a href=\"admin/post_admin.php?source=edit_post&p_id={$user_id}\">Edit Post</a>
                                            </li>";
                                }
                            }
                           

                        ?>




                    </ul>
                </div>
                <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
