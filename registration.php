<?php 
    if( file_exists("includes/db.php") && is_readable("includes/db.php")) {

        include "includes/db.php";

    } ?>

    <?php  include "includes/header.php"; ?>
    <?php

        if(isset($_POST['submit'])){
            global $connection;
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $username = mysqli_real_escape_string($connection, htmlspecialchars($username));

                $email = mysqli_real_escape_string($connection, htmlspecialchars($email));

                $password = mysqli_real_escape_string($connection, htmlspecialchars($password));


            $sql ="SELECT randSalt FROM users";
            $query_randSalt = mysqli_query($connection, $sql);

            if(!$query_randSalt){
                die("Query failed " . mysqli_error($connection));
            }
                $row = mysqli_fetch_assoc($query_randSalt);

                $rand  = $row['randSalt'];
                $password = crypt($password, $rand);

                $sqls = "INSERT INTO users (user_name, user_password, user_email, user_role) ";

                $sqls.= "VALUES('{$username}', '{$password}', '{$email}', 'subscriber')";

                $query = mysqli_query($connection, $sqls);

                if(!$query){
                    die("Query Failed " . mysqli_error($connection));
                }


        }



    ?>

    <!-- Navigation -->

<?php  require_once "includes/navigation.php"; ?>


    <!-- Page Content -->
    <div class="container"> 

        <section id="login">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="form-wrap">
                            <h1>Register</h1>
                            <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">

                                <div class="form-group">
                                    <label for="username" class="sr-only">username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" required>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" required>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="key" class="form-control" placeholder="Password" required>
                                </div>

                                <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                            </form>

                        </div>
                    </div> <!-- /.col-xs-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section>


    <hr>



    <?php include "includes/footer.php";?>
