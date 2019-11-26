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
        <label for="cat-title">Category ID</label>
        <select name="post_cateogry" id="post_category_select">
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
        <input class="btn btn-primary" type="submit" name="create_post" value="Update Post">
    </div>
</form>