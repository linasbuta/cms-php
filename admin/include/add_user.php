<?php


    global $connection;
    if(isset($_POST['submit'])) {

        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];
        $first_name = $_POST ['first_name'];
        $user_lastname = $_POST['user_lastname'];

        $user_image = $_FILES['user_image']['name']; 
        $user_image_temp = $_FILES['user_image']['tmp_name']; 

        $user_email = $_POST['user_email'];


        $user_role = $_POST['user_role'];

        move_uploaded_file($user_image_temp, "../user_image/$user_image");

        $query = "INSERT INTO users (user_name, user_password, first_name, user_lastname, user_email, user_image, user_role) VALUES ('{$user_name}', '{$user_password}', '{$first_name}', '{$user_lastname}', '{$user_email}', '{$user_image}', '{$user_role}') ";

        $result = mysqli_query($connection, $query);
        if ($result) {

            echo "Post Published";
        } else {
            echo "(Error Code:" . $_FILES['post_image']['error'] . ")";
        }
    }

?>


    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="user_name">User_name</label>
            <input type="text" name='user_name' class="form-control">
        </div>

        <div class="form-group">
            <label for="user_password">User_password</label>
            <input type="password" name='user_password' class="form-control">
        </div>






        <div class="form-group">
            <label for="first_name">First_name</label>
            <input type="text" name='first_name' class="form-control">
        </div>



        <div class="form-group">
            <label for="user_image">Upload Image</label>
            <input type="file" name="user_image" id="user_image" class="form-control">
        </div>



        <div class="form-group">
            <label for="user_lastname">User_lastname</label>
            <input type="text" name='user_lastname' class="form-control">
        </div>

        <div class="form-group">
            <label for="user_email">User_email</label>
            <input type="email" name='user_email' class="form-control">
        </div>


        <div class="form-group">
            <select name="user_role" id="">
                <option value="subscriber">Select option</option>
            <option value="admin">Admin</option>
                <option value="subscriber">Subscriber</option>
            </select>
        </div>

        <input class="btn btn-primary" type="submit" name="submit" value="Publish USER">

    </form>











