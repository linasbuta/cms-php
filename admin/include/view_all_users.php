
    <table class="table table-bordered table-hover ">
        <thead>
        <tr>
            <th>Id</th>
            <th>User_name</th>
            <th>User_password</th>
            <th>First_name</th>
            <th>Last_name</th>
            <th>Email</th>
            
            <th>User_role</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>to Ad</th>
            <th>to Sub</th>


        </tr>
        </thead>
        <tbody>
        <?php
            global $connection;
            $sql ="SELECT * FROM users";
            $result = mysqli_query($connection, $sql);
            if(!$result){
                die("Query Failed" . mysqli_error($connection));
            }else{
                while ($row = mysqli_fetch_assoc($result)){
                    $user_id = $row['user_id'];
                    $user_name = $row['user_name'];
                    $user_password = substr($row['user_password'], 0, 10);
                    $user_firstname = $row['first_name'];
                    $user_lastname = $row['user_lastname'];
                    $user_email = $row['user_email'];
                
                    $user_role = $row['user_role'];
                    $user_img = $row['user_image'];


                    echo "<tr>";
                    echo"<td>{$user_id}</td>";
                    echo"<td>{$user_name}<br>
                    <img src='../user_image/{$user_img}'>
                    </td>";
                    echo"<td>{$user_password}</td>";
                    echo"<td>{$user_firstname}</td>";
                    echo"<td>{$user_lastname}</td>";
                    echo"<td>{$user_email}</td>";
                    
                    echo"<td>{$user_role}</td>";




                    echo "<td><a href='users_admin.php?users=edit_user&user_id=$user_id'><button class=\"btn btn-warning\">Edit</button></a></td>";

                    echo "<td><a href='users_admin.php?delete=$user_id'><button class=\"btn btn-warning\">DELETE</button></a></td>";



                    echo "<td><a href='users_admin.php?change_to_admin=$user_id'><button class=\"btn btn-warning\">admin</button></a></td>";
                    echo "<td><a href='users_admin.php?change_to_subscribe=$user_id'><button class=\"btn btn-warning\">Subscribe</button></a></td>";



                    echo"</tr>";


                }

            }

        ?>
        </tbody>

    </table>

<?php
        //change to admin
        if(isset($_GET['change_to_admin'])){
        $admin_approve = $_GET['change_to_admin'];

        global $connection;
        $sql = "UPDATE users SET user_role = 'admin' WHERE user_id = $admin_approve";
        $result_query = mysqli_query($connection, $sql);

        $num = mysqli_affected_rows($connection);

        if($num> 0){
        echo"	<div class='alert alert-danger'>
            <strong>Success!</strong>Success.
        </div>";
        header("Location: users_admin.php");
        }


        }
        // change to subscriber
        if(isset($_GET['change_to_subscribe'])){
            $subscribe_approve = $_GET['change_to_subscribe'];

            global $connection;
            $sql = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $subscribe_approve";
            $result_query = mysqli_query($connection, $sql);

            $num = mysqli_affected_rows($connection);

            if($num> 0){
                echo"	<div class='alert alert-danger'>
            <strong>Success!</strong> Success.
        </div>";
                header("Location: users_admin.php");
            }


        }

?>

<?php

?>

<?php
    //user delete
    if(isset($_GET['delete'])) {
        global $connection;
        $sql = "DELETE FROM users WHERE user_id = " . $_GET['delete'] . " ";
        $result_query = mysqli_query($connection, $sql);

        $num = mysqli_affected_rows($connection);

        if ($num > 0) {
                    echo "	<div class='alert alert-danger'>
            <strong>Success!</strong> .
            </div>";
            header("Refresh: 3;");
        }

    }
?>
