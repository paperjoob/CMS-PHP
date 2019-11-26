<?php 
    // if the p_id is set
    if(isset($_GET['p_id'])) {
        // assign variable to the GET of post ID
        $get_edit_post_id = $_GET['p_id'];


    }

    // query
    $query = "SELECT * FROM posts WHERE post_id = $get_edit_post_id";
    $select_post_by_id_edit = mysqli_query($connection, $query);

    // check if there are errors
    confirmQuery($select_post_by_id_edit);

    // while loop through to grab each value and assign them each a value
    while($row = mysqli_fetch_assoc($select_post_by_id_edit)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_content = $row['post_content'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];

    }

    // if the update post button is pressed, do this
    if(isset($_POST['update_post'])) {
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_category_id = $_POST['post_category_id'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['post_image']['name']; // image name
        $post_image_temp = $_FILES['post_image']['tmp_name']; // temporary location so we can see it
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];

        move_uploaded_file($post_image_temp, "../images/$post_image");

        // if the image is empty, grab the image from the database;
        if(empty($post_image)) {
            $query = "SELECT * FROM posts WHERE post_id = $get_edit_post_id";
            $select_image = mysqli_query($connection, $query);

            while($row = mysqli_fetch_array($select_image)) {
                $post_image = $row['post_image'];
            }
        }

        // update query
        $query = "UPDATE posts SET post_title = '{$post_title}', ";
        $query .= "post_author = '{$post_author}', post_category_id = '{$post_category_id}',";
        $query .= "post_date = now(), ";
        $query .= "post_status = '{$post_status}', post_image = '{$post_image}', ";
        $query .= "post_tags = '{$post_tags}', post_content = '{$post_content}' ";
        $query .= "WHERE post_id = {$get_edit_post_id} ";

        // update post query to send to the database and update the post by the specific ID
        $update_post_query = mysqli_query($connection, $query);
        // confirm the query has no errors, if there are, an error will be triggered
        confirmQuery($update_post_query);
    }
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="cat-title">Title</label>
        <input value="<?php echo $post_title ?>" class="form-control" type="text" name="post_title">
    </div>
    <div class="form-group">
        <label for="cat-title">Author</label>
        <input value="<?php echo $post_author ?>" class="form-control" type="text" name="post_author">
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
        <input value="<?php echo $post_status ?>" class="form-control" type="text" name="post_status">
    </div>
    <div class="form-group">
        <label for="cat-title">Image</label>
        <br/>
        <img src="../images/<?php echo $post_image; ?>" width=100>
        <input type="file" name="post_image">
    </div>
    <div class="form-group">
        <label for="cat-title">Tags</label>
        <input value="<?php echo $post_tags ?>" class="form-control" type="text" name="post_tags">
    </div>
    <div class="form-group">
        <label for="cat-title">Content</label>
        <textarea class="form-control" type="text" id="" name="post_content" cols="20" rows="10"><?php echo $post_content ?>
        </textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
    </div>
</form>