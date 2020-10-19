<?php

    global $connection;
    if(isset($_GET['p_id'])) {
        $post_id = $_GET['p_id'];
    }

    global $connection;
    $sql = "SELECT * FROM posts WHERE post_id = $post_id ";
    $result_query = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_array($result_query)){
       $post_id =$row['post_id'];

    $post_category_id =$row['post_category_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_status = $row['post_status'];


}

/*update section*/

if(isset($_POST['update'])){

    $post_title          =  $_POST['post_title'];
    $post_category_id    =  $_POST['post_category'];
    $post_status         =  $_POST['post_status'];
    $post_author         =  $_POST['post_author'];
    $post_image          =  $_FILES['image']['name'];
    $post_image_temp     =  $_FILES['image']['tmp_name'];
    $post_content        =  $_POST['post_content'];
    $post_tags           =  $_POST['post_tags'];

    move_uploaded_file($post_image_temp, "../images/$post_image");

    if(empty($post_image)) {

        $query = "SELECT * FROM posts WHERE post_id = $post_id ";
        $select_image = mysqli_query($connection,$query);

        while($row = mysqli_fetch_array($select_image)) {

            $post_image = $row['post_image'];

        }


    }
    $post_title = mysqli_real_escape_string($connection, $post_title);


    $query = "UPDATE posts SET ";
    $query .="post_title  = '{$post_title}', ";
    $query .="post_category_id = '{$post_category_id}',  ";
    $query .="post_author = '{$post_author}', ";
    $query .="post_date   =  now(), ";
    
    $query .="post_status = '{$post_status}', ";
    $query .="post_tags   = '{$post_tags}', ";
    $query .="post_content= '{$post_content}', ";
    $query .="post_image  = '{$post_image}' ";
    $query .= "WHERE post_id = {$post_id} ";

    $update_post = mysqli_query($connection,$query);

    echo "<div class='alert-success'>success <a href='post_admin.php?p_id={$post_id}'>View</a></div>";



}

?>



    <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="post_title">Title</label>
                <input type="text" name='post_title' class="form-control" value="<?php echo $post_title; ?>">
            </div>
            <div class="form-group">
                <label for="Post_author">Post Author</label>
                <input type="text" name='post_author' class="form-control" value="<?php echo $post_author;?>">
            </div>



            <div class="form-group">
                <select name="post_category" id="post_category">
                    <?php

                        global $connection;
                        $sql = "SELECT * FROM categories";
                        $result_query = mysqli_query($connection, $sql);

                        while($row = mysqli_fetch_array($result_query)) {


                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];

                            echo "<option value='{$cat_id}'>{$cat_title}</option>";
                        }



                    ?>
                </select>


            </div>






        <div class="form-group">
            <select name='post_status'>
                <option value="draft"><?php echo $post_status; ?></option>
                <?php
                if($post_status == 'published'){
                echo"  <option value=\"draft\">draft</option>";
                }else{
                    echo"  <option value=\"published\">published</option>";
                }
                ?>

            </select>

        </div>





        <div class="form-group">
            <label for="post_image">Upload Image</label>
            <img width="100" src="../images/<?php echo $post_image; ?>">
            <input  type="file" name="image">
        </div>



        <div class="post tags">
            <label for="post_tags">Post Tags</label>
            <input type="text" name='post_tags' class="form-control"
                value="<?php echo $post_tags;?>">
        </div>
        <div class="post comment count">
            <label for="post_comment_count">Post Comment Count</label>
            <input type="text" name='post_comment_count' class="form-control"
                value="<?php echo $post_comment_count; ?>">
        </div>

        <div class="form-group">
            <label for="post_date">post date</label>
            <input type="date" name='post_date' class="form-control"
                value="<?php echo $post_date; ?>">
        </div>
        <div class="form-group">
            <label for="post_content">Post content</label>
            <textarea class="form-control" name="post_content" id="body" cols="10" rows="10"
            ><?php echo $post_content;?></textarea>
        </div>
        <input class="btn btn-primary" type="submit" name="update" value="Publish Post">



    </form>