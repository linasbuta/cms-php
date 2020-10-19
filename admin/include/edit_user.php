<?php

    global $connection;
    if(isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
    }
        global $connection;
        $sql = "SELECT * FROM users WHERE user_id = $user_id ";
        $result_query = mysqli_query($connection, $sql);

        while($row = mysqli_fetch_assoc($result_query)){
            $user_ids =$row['user_id'];

            $user_name = $row['user_name'];
            $user_password = $row['user_password'];
            $first_name = $row ['first_name'];
            $user_lastname = $row['user_lastname'];
            $user_image = $row['user_image'];
            $user_email = $row['user_email'];


            $user_role = $row['user_role'];
            $rand  = $row['randSalt'];


        }


    /*update section*/
    if(isset($_POST['update_user'])){

        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];
        $first_name = $_POST ['first_name'];
        $user_lastname = $_POST['user_lastname'];
        $user_image = $_FILES['user_image']['name']; 
        $user_image_temp = $_FILES['user_image']['tmp_name']; 

        $user_email = $_POST['user_email'];


        $user_role = $_POST['user_role'];

        move_uploaded_file($user_image_temp, "../user_image/$user_image");

        if(empty($user_image)) {

            $query = "SELECT * FROM users WHERE user_id = $user_id ";
            $select_image = mysqli_query($connection,$query);

            while($row = mysqli_fetch_array($select_image)) {

                $user_image = $row['user_image'];

            }


        }
      
        $sql ="SELECT randSalt FROM users";
        $query_randSalt = mysqli_query($connection, $sql);

        if(!$query_randSalt){
            die("Query failed " . mysqli_error($connection));
        }
        $row = mysqli_fetch_assoc($query_randSalt);
        $rand  = $row['randSalt'];
        $has_password = crypt($user_password, $rand);


        $query = "UPDATE users SET ";
        $query .="user_name  = '{$user_name}', ";
        $query .="user_password = '{$has_password}', ";


        $query .="first_name = '{$first_name}', ";
        $query .="user_lastname   = '{$user_lastname}', ";

        $query .="user_email= '{$user_email}', ";
        $query .="user_image  = '{$user_image}', ";
        $query .="user_role  = '{$user_role}' ";
        $query .="WHERE user_id = {$user_id} ";


        $update_user = mysqli_query($connection,$query);

        if(!$update_user){
            die("Query Failed " . mysqli_error($connection));
        }



    }

?>


    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="user_name">User_name</label>
            <input type="text" name='user_name' class="form-control" value="<?php echo $user_name; ?>">
        </div>

        <div class="form-group">
            <label for="user_password">User_password</label>
            <input type="password" name='user_password' class="form-control"
                value="<?php echo $user_password; ?>">
        </div>






        <div class="form-group">
            <label for="first_name">First_name</label>
            <input type="text" name='first_name' class="form-control"
                value="<?php echo $first_name;?>">
        </div>



        <div class="form-group">
            <label for="user_image">Upload Image</label>
            <img width="100" src="../user_image/<?php echo $user_image; ?>">
            <input type="file" name="user_image" id="user_image" class="form-control">
        </div>



        <div class="form-group">
            <label for="user_lastname">User_lastname</label>
            <input type="text" name='user_lastname' class="form-control"value="<?php echo $user_lastname;?>">
        </div>

        <div class="form-group">
            <label for="user_email">User_email</label>
            <input type="email" name='user_email' class="form-control"value="<?php echo $user_email;?>">
        </div>




        <div class="form-group">

            <select name="user_role">
                <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
    <?php


                if($user_role == "admin"){
                    echo "<option value='subscriber'>Subscriber</option>";
                }else {

                    echo "<option value='admin'>admin</option>";
                }

    ?>
            </select>



        </div>

        <input class="btn btn-primary" type="submit" name="update_user" value="Publish USER">

    </form>








