
<script src="js/scripts.js"></script>

 <?php


    global $connection;
    if(isset($_POST['submit'])) {

        $post_category_id = $_POST['post_category'];
        $post_title = $_POST['post_title'];
        $post_author = $_POST ['post_author'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['post_image']['name']; 
        $post_image_temp = $_FILES['post_image']['tmp_name']; 

        $post_tags = $_POST['post_tags'];

        $post_date = date('d-m-y');
        $post_content = $_POST['post_content'];
        $post_status = $_POST['post_status'];
        move_uploaded_file($post_image_temp, "../images/$post_image");

        $query = "INSERT INTO posts (post_category_id, post_title, post_author, post_status, post_image, post_tags, post_date, post_content) VALUES ('{$post_category_id}', '{$post_title}', '{$post_author}', '{$post_status}', '{$post_image}', '{$post_tags}', now(), '{$post_content}') ";

        $result = mysqli_query($connection, $query);
        if ($result) {

            echo"	<div class='alert alert-success'>
                <strong>Success!</strong>  <a href='post_admin.php'>All Posts</a>
                </div>";

        } else {
            echo "(Error Code:" . $_FILES['post_image']['error'] . ")";
        }
    }

?>


    <form action="" method="post" enctype="multipart/form-data">
        
        <div class="form-group">
            <label for="post_title">Title</label>
            <input type="text" name='post_title' class="form-control">
        </div>
        <div class="form-group">
            <label for="Post_author">Post Author</label>
            <input type="text" name='post_author' class="form-control">
        </div>



        <div class="form-group">
            <label for="post_category">Post Category</label><br>

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
       
        <label for="post_status">Post Status</label><br>
        <select name="post_status" id="post_status">
            <option value="draft">Select</option>
            <option value="draft">Draft</option>
            <option value="published">Published</option>

        </select>
    </div>



    <div class="form-group">
        <label for="post_image">Upload Image</label>
        <input type="file" name="post_image" id="post-image" class="form-control">
    </div>



    <div class="post tags">
        <label for="post_tags">Post Tags</label>
        <input type="text" name='post_tags'  class="form-control">
    </div>

    
    <div class="form-group">
        <label for="post_date">post date</label>
        <input type="date" name='post_date' class="form-control">
    </div>





    <div class="form-group">


        <label for="post_content">Post content</label>
        <textarea name="post_content" id="body" cols="30" rows="20"></textarea>
    </div>



    <input class="btn btn-primary" type="submit" name="submit" value="Publish Post">
 
</form>


























