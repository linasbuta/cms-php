<?php
require_once ("db.php");

function categories_display(){
    global $connection;
    $sql = "SELECT * FROM categories";
    $result_query = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_array($result_query)){
$category =<<<CATEGORY
    <li>
    
        
        <a href="category.php?category={$row['cat_id']}">{$row['cat_title']}</a>
        
    </li>
CATEGORY;

echo $category;



    }

}
/*========== Post display  ================================================*/


function post_display()
{
    global $connection;

    $sql = "SELECT * FROM posts ";
    $result_query = mysqli_query($connection, $sql);


    while ($row = mysqli_fetch_array($result_query)) {
        $post_status =$row['post_status'];
        $post_content = substr($row['post_content'],0, 100 );
        if($post_status !== 'published'){

        }else{
                 echo"<h2>";
                    echo "<a href=\"post.php?p_id={$row['post_id']}\">{$row['post_title']}</a>";
                echo "</h2>";
                echo " <p class=\"lead\">
                    by <a href=\"post_author.php?author={$row['post_author']}&p_id={$row['post_id']}\">{$row['post_author']}</a>";
                echo "</p>";
                
                
                echo"<p><span class=\"glyphicon glyphicon-time\"></span> Posted on {$row['post_date']} </p>";
                echo "<hr>";
                echo"<a href=\"post.php?p_id={$row['post_id']}\"><img class=\"img-responsive\"src=\"images/{$row['post_image']}\" alt=\"\"></a>";
                echo "<hr>";
                echo"<p>{$post_content}</p>";
                


               echo "<hr>";

        }

    }
}


/*==========================================*/
function only_post_display(){

    if(isset($_GET['p_id'])) {
        $p_id= $_GET['p_id'];
        global $connection;

        $sql = "SELECT * FROM posts WHERE post_id =". $_GET['p_id']." ";
        $result_query = mysqli_query($connection, $sql);


        while ($row = mysqli_fetch_assoc($result_query)) {

            $post = <<<POSTS
                <h2>
                    <a href="post.php?p_id={$row['post_id']}">{$row['post_title']}</a>
                </h2>
                <p class="lead">
                    by <a href="post_author.php?author={$row['post_author']}&p_id={$row['post_id']}">{$row['post_author']}</a>
                </p>
                
                
                <p><span class="glyphicon glyphicon-time"></span> Posted on {$row['post_date']} </p>
                <hr>
                
                <img class="img-responsive" src="images/{$row['post_image']}" alt="">
                <hr>
                <p>{$row['post_content']}</p>
                
                

                <hr>
POSTS;

            echo $post;


        }

    }



}

/*============Author post============================================*/

function author_post_display(){

    if(isset($_GET['author'])) {

        $p_author = $_GET['author'];

        global $connection;

        $sql = "SELECT * FROM posts WHERE post_author ='{$p_author}' ";
        $result_query = mysqli_query($connection, $sql);


        while ($row = mysqli_fetch_assoc($result_query)) {

            $post = <<<POSTS
                <h2>
                   <a href="post.php?p_id={$row['post_id']}"> {$row['post_title']}</a>
                </h2>
                <p class="lead">
                   All post by{$row['post_author']}
                </p>
                
                
                <p><span class="glyphicon glyphicon-time"></span> Posted on {$row['post_date']} </p>
                <hr>
                
                <img class="img-responsive" src="images/{$row['post_image']}" alt="">
                <hr>
                <p>{$row['post_content']}</p>
                
                

                <hr>
POSTS;

            echo $post;


        }

    }



}

/*=========================Blog search engine===========================*/

function search_engine(){
    if(isset($_POST['submit'])){
        $search = $_POST['search'];
        global $connection;
        $sql = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
        $result_query = mysqli_query($connection, $sql);
        if(!$result_query){
            die("Error" . mysqli_error($connection));
        }




$count = mysqli_num_rows($result_query);
if($count == 0){
    echo"No results found";
}else{
    while($row = mysqli_fetch_array($result_query)){
        $post =<<<POSTS
      <h2>
                    <a href="#">{$row['post_title']}</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">{$row['post_author']}</a>
                </p>
                
                
                <p><span class="glyphicon glyphicon-time"></span> Posted on {$row['post_date']} </p>
                <hr>
                <img class="img-responsive" src="images/{$row['post_image']}" alt="">
                <hr>
                <p>{$row['post_content']}</p>
                
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
POSTS;

        echo $post;



    }
}

    }



}

/*=========================Blog categories well================*/

function side_categories(){
    global $connection;

    $sql = "SELECT * FROM categories ";
    $result_query = mysqli_query($connection, $sql);


    while($row = mysqli_fetch_array($result_query)){
        $side_categories =<<<SIDECATEGORIES
       <li><a href="category.php?category={$row['cat_id']}">{$row['cat_title']}</a></li>
SIDECATEGORIES;

        echo $side_categories;

    }


}














