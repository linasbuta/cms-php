<?php include_once("../includes/db.php"); 


function categories_dispaly_admin(){

    global $connection;
    $sqls = "SELECT * FROM categories";
   $result_querys = mysqli_query($connection, $sqls);

    while($row = mysqli_fetch_assoc($result_querys)){
$category =<<<CATEGORY
      <tr>
              <td>{$row['cat_id']}</td>
              <td>{$row['cat_title']}</td>
              <td><a href="categories_admin.php?delete={$row['cat_id']}">
              <button class="btn btn-danger">Delete</button></a></td>


              <td><a href="categories_admin.php?edit={$row['cat_id']}">
              <button class="btn btn-warning">Edit</button></a></td>
              
              
              

          </tr>
CATEGORY;

echo $category;



    }

}
/*=======Add categories =================================================*/

function add_categories_admin(){

    if(isset($_POST['submit'])){
            $cat_title = $_POST['cat_title'];
        

        if($cat_title == ""|| empty($cat_title)){
                echo"	<div class='alert alert-danger'>
                <strong>Empty Field!</strong> .
                </div>";
        }else{


            global $connection;
                $sql = "INSERT INTO categories(cat_title) VALUES('{$cat_title}')";
            $result_query = mysqli_query($connection, $sql);

            $num = mysqli_affected_rows($connection);
            if($num ==0){
                echo "Failed";
            }else{

            echo"	<div class='alert alert-success'>
            <strong>Success!</strong> .
            </div>";
                header("Refresh: 3;"); 

            }
        }
    }

}


/*==========================delete_categories_admin================================================*/

function delete_categories_admin(){

    if(isset($_GET['delete'])){
        global $connection;
            $sql = "DELETE FROM categories WHERE cat_id = ". $_GET['delete']. " ";
        $result_query = mysqli_query($connection, $sql);

        $num = mysqli_affected_rows($connection);

        if($num> 0){
            echo"	<div class='alert alert-danger'>
                <strong>Success!</strong> .
                </div>";
            header("Refresh: 3;");
        }


    }

}





/*==================EDIT UPDATE Category admin==================================*/
function edit_admin_category(){

if(isset($_GET['edit'])){

    global $connection;
    $sql = "SELECT * FROM categories WHERE cat_id = ". $_GET['edit']." ";
   $result_query = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_array($result_query)){
$category =<<<EDIT
 <div class="form-group">
        
        <label for="cat_title">Edit category</label>
      <input class="form-control" type="text" name="cat_title"
       value="{$row['cat_title']}">
        
      </div>


       <div class="form-group">

        <input class="btn btn-primary" type="submit" name="update" value="Update">
      </div>
EDIT;

echo $category;



    }

}

}


/*=======================UPDATE category=====================================*/

function update(){
    if (isset($_POST['update'])) {
            global $connection;
            $cat_title = $_POST['cat_title'];

            $sql = "UPDATE categories SET ";
            $sql.= "cat_title = '{$cat_title}' ";
            $sql.= "WHERE cat_id = ". $_GET['edit']."";
        $result_query = mysqli_query($connection, $sql);


        $num = mysqli_affected_rows($connection);
        if($num ==0){
            echo"	<div class='alert alert-danger'>
        <strong>Failed!</strong> .
        </div>";
        header("Refresh: 3;");
        }else{

            echo"	<div class='alert alert-success'>
            <strong>Success!</strong> .
            </div>";
            header("Refresh: 3;");


        }
        
    }
}

/*==============================================================================
*                                                                                   *
*                                                                                   *
*        POST FUNCTION START                              *
*                                                                                   *
*====================================================================================*/

function all_post_display_admin(){

         global $connection;
        $sql = "SELECT * FROM posts  ORDER BY post_id DESC ";
         $result_query = mysqli_query($connection, $sql);

        while($row = mysqli_fetch_assoc($result_query)){
            $post_title         = $row['post_title'];
            $post_category_id   = $row['post_category_id'];
            $post_date          = $row['post_date'];
            $post_author        = $row['post_author'];
            $post_status        = $row['post_status'];
            $post_image         = $row['post_image'] ;
            $post_tags          = $row['post_tags'];
            $post_content       = substr($row['post_content'],0 , 50);

    echo"   <tr>";
        ?>

                <td><input type="checkbox" class="checkBoxes" name="checkBoxArray[]"
                    value="<?php  echo $row['post_id'] ;?>">
                </td>


        <?php
        echo" <td>{$row['post_id']}</td>";
            
        $sqlas = "SELECT * FROM categories WHERE cat_id = '{$post_category_id}'";
        $resultatas = mysqli_query($connection, $sqlas);
        while ($rowas = mysqli_fetch_assoc($resultatas)) {


            echo " <td>{$rowas['cat_title']}</td>";
        }
            
                      
            echo "<td>{$row['post_title']}</td>";


            echo"<td>{$row['post_author']}</td>";
            echo"<td>{$row['post_date']}</td>";
                echo"<td><img width='100' src=\"../images/{$row['post_image']}\" alt=\"\"></td>";
            echo"<td>{$post_content }</td>";
            echo"<td>{$row['post_tags']}</td>";
            echo"<td>{$row['post_comment_count']}</td>";
            echo"<td>{$row['post_status']}</td>";


    echo"</tr>";



        }

}


/*============Edit_all_post===========================================*/

function edit_all_post_display_admin(){

    global $connection;
    $sql = "SELECT * FROM posts";
    $result_query = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_assoc($result_query)){
        $post_title         = $row['post_title'];
        $post_category_id   = $row['post_category_id'];
        $post_date          = $row['post_date'];
        $post_author        = $row['post_author'];
        $post_status        = $row['post_status'];
        $post_image         = $row['post_image'] ;
        $post_tags          = $row['post_tags'];
        $post_content       = substr($row['post_content'],0 , 50);

        echo"   <tr>";
            ?>

           <?php
            echo" <td>{$row['post_id']}</td>";

            $sqlas = "SELECT * FROM categories WHERE cat_id = '{$post_category_id}'";
            $resultatas = mysqli_query($connection, $sqlas);
            while ($rowas = mysqli_fetch_assoc($resultatas)) {


                echo " <td>{$rowas['cat_title']}</td>";
            }


            echo "<td>{$row['post_title']}</td>";
            echo"<td>{$row['post_author']}</td>";
            echo"<td>{$row['post_date']}</td>";
            echo"<td><img width='100' src=\"../images/{$row['post_image']}\" alt=\"\"></td>";
            echo"<td>{$post_content }</td>";
            echo"<td>{$row['post_tags']}</td>";
            echo"<td>{$row['post_comment_count']}</td>";
            echo"<td>{$row['post_status']}</td>";


            echo" <td><a href=\"post_admin.php?source=edit_post&p_id={$row['post_id']}\">
                <button class=\"btn btn-warning\">Edit</button></a></td>";
        echo"</tr>";




    }

}




/*======================DELETE  POST=========================================*/

function delete_post_admin(){

        if(isset($_GET['delete'])){

                global $connection;
                $sql = "DELETE FROM posts WHERE post_id = ". $_GET['delete']. " ";
                $result_query = mysqli_query($connection, $sql);

                $num = mysqli_affected_rows($connection);

                if($num> 0){
                    echo"	<div class='alert alert-danger'>
                    <strong>Success!</strong>.
                    </div>";
                    header("Refresh: 3;");
                }


        }


}




?>