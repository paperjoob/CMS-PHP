<?php 
    // if the create_post submission is posted, send them to the database with an Insert query;
    if(isset($_POST['create_post'])) {
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_category_id = $_POST['post_category_id'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['post_image']['name']; // image name
        $post_image_temp = $_FILES['post_image']['tmp_name']; // temporary location so we can see it

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-my'); // the date format to day month year
        $post_comment_count = 3;

        // create a function called move_uploaded_file to move from temporary location 
        // to the ../images folder in the root directory
        move_uploaded_file($post_image_temp, "../images/$post_image");

        $query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content,
        post_tags, post_comment_count, post_status)";
        $query .= "VALUES ($post_category_id, '{$post_title}', '{$post_author}', now(), '{$post_image}', 
        '{$post_content}', '{$post_tags}', '{$post_comment_count}', '{$post_status}') ";

        // send query to the database to create POST
        $create_post_query = mysqli_query($connection, $query);

        // kill the query if it fails and show error from the functions.php
        confirmQuery($create_post_query);
    }

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="cat-title">Title</label>
        <input class="form-control" type="text" name="post_title">
    </div>
    <div class="form-group">
        <label for="cat-title">Author</label>
        <input class="form-control" type="text" name="post_author">
    </div>
    <div class="form-group">
        <label for="cat-title">Category</label>
        <select name="post_category_id" id="post_category_select">
            <?php 
                // create a query to select all categories where the category id is equal to the one selected
                $query = "SELECT * FROM categories"; // 
                // query mysql with the connection and query
                $select_categories = mysqli_query($connection, $query);

                // if there are errors, run the confirmQuery function to show the errors
                confirmQuery($select_categories);

                // create a while loop for all the categories
                while($row = mysqli_fetch_assoc($select_categories)) {
                    // the result will be returned in an associative array
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    // the option values are the category titles and the values are set to their IDs
                echo "<option value='{$cat_id}'>{$cat_title}</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="cat-title">Status</label>
        <input class="form-control" type="text" name="post_status">
    </div>
    <div class="form-group">
        <label for="cat-title">Image</label>
        <input type="file" name="post_image">
    </div>
    <div class="form-group">
        <label for="cat-title">Tags</label>
        <input class="form-control" type="text" name="post_tags">
    </div>
    <div class="form-group">
        <label for="cat-title">Content</label>
        <textarea class="form-control" type="text" id="" name="post_content" cols="20" rows="10"></textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Add Post">
    </div>
</form>