    <?php
    include ("db.php");
    session_start();
    ?>

    <?php
        if(isset($_POST['login'])){
                $name = mysqli_real_escape_string($connection, $_POST['user_name']);
                $pass = mysqli_real_escape_string($connection, $_POST['user_password']);

                $sql ="SELECT * FROM users WHERE user_name = '{$name}' ";
                $result_query = mysqli_query($connection, $sql);
            if(!$result_query){

                    die("Query Failed " . mysqli_error($connection));
            }

            while (($row = mysqli_fetch_assoc($result_query))){

                $db_id = $row['user_id'];
                $user_name = $row['user_name'];
                $user_password = $row['user_password'];
                $first_name = $row['first_name'];
                $user_lastname = $row['user_lastname'];
                $user_role = $row['user_role'];
                $salt = $row['randSalt'];
            }


            $pass = crypt($pass, $user_password);

           
            if($name !== $user_name && $pass !== $user_password){

                header("Location: ../index.php");

            
            } elseif($name == $user_name && $pass == $user_password) {

                $_SESSION['username'] = $user_name;
                $_SESSION['first_name'] = $first_name;
                $_SESSION['lastname'] = $user_lastname;
                $_SESSION['user_role'] = $user_role;
                $_SESSION['id_user'] = $db_id;


                header("Location: ../admin");





            }else{
                header("Location: ../index.php");
            }

        }

    ?>

