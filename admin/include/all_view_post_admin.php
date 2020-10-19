

<?php

    if(isset($_POST['checkBoxArray'])){

        foreach ($_POST['checkBoxArray'] as $ceckboxValue){
             $bulk_options = $_POST['bulk_options'];

            switch ($bulk_options){
                case 'published':
                $sql ="UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$ceckboxValue} ";
                $query = mysqli_query($connection, $sql);
                if(!$query){
                    die("Query Failde " . mysqli_error($connection));
                }
                    break;

                case 'draft':
                    $sql_draft ="UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$ceckboxValue} ";
                    $query_draft = mysqli_query($connection, $sql_draft);
                    if(!$query_draft){
                        die("Query Failde " . mysqli_error($connection));
                    }
                    break;
                case 'delete':
                    $sql_delete ="DELETE  FROM posts  WHERE post_id = {$ceckboxValue} ";
                    $query_delete = mysqli_query($connection, $sql_delete);
                    if(!$query_delete){
                        die("Query Failde " . mysqli_error($connection));
                    }
                    break;


                case 'clone':

                    $sql = "SELECT * FROM posts WHERE post_id = {$ceckboxValue}";
                    $select_post_query = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_assoc($select_post_query)){
                     $post_author = $row['post_author'];
                     $post_date = $row['post_date'];
                        $post_title          =  $row['post_title'];
                        $post_category_id    =  $row['post_category_id'];
                        $post_status         =  $row['post_status'];
                        $post_image          =  $row['post_image'];

                        $post_content        =  $row['post_content'];
                        $post_tags           =  $row['post_tags'];



                    }
                    $query = "INSERT INTO posts (post_category_id, post_title, post_author, post_status, post_image, post_tags, post_date, post_content) VALUES ('{$post_category_id}', '{$post_title}', '{$post_author}', '{$post_status}', '{$post_image}', '{$post_tags}', now(), '{$post_content}') ";

                    $result = mysqli_query($connection, $query);
                if(!$result){

                    die("Clone query failed " . mysqli_error($connection));
                }
                    break;





            }

        }
    }



?>

    <form action="" method="post">

    <table class="table table-bordered table-hover ">

        <div id="bulkOptionsContainer" class="col-xs-4">
            <select name="bulk_options" id="bulk_options" class="form-control">

                <option>Select</option>
                <option value="published">Publish</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
                <option value="clone">Clone</option>

            </select>


        </div>
        <div class="col-xs-4">
    <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a href="post_admin.php?source=add_post" class="btn btn-primary">Add new</a>

        </div>

    <thead>
        <tr>
            <th><input type="checkbox" id="selectAllBoxes"></th>
        <th>Id</th>
        <th>Categoy_id</th>
        <th>Title</th>
        <th>Author</th>
        <th>Date</th>
        <th>Image</th>
        <th>P_content</th>
        <th>Tags</th>
        <th>p_c_counter</th>
        <th>Status</th>



        </tr>
    </thead>
    <tbody>
    <?php  all_post_display_admin();?>
    </tbody>

    </table>


    </form>


    
