<?php 
    // if the p_id is set
    if(isset($_GET['p_id'])) {
        // assign variable to the GET of post ID
        $get_edit_post_id = $_GET['p_id'];


    }

    // query
    $query = "SELECT * FROM posts WHERE post_id = $get_edit_post_id";
    $select_post_by_id_edit = mysqli_query($connection, $query);

    // while loop through to add each value in a row
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
        <input value="<?php echo $post_category_id ?>" class="form-control" type="text" name="post_category_id">
    </div>
    <div class="form-group">
        <label for="cat-title">Status</label>
        <input value="<?php echo $post_status ?>" class="form-control" type="text" name="post_status">
    </div>
    <div class="form-group">
        <label for="cat-title">Image</label>
        <input type="file" name="post_image">
    </div>
    <div class="form-group">
        <label for="cat-title">Tags</label>
        <input value="<?php echo $post_tags ?>" class="form-control" type="text" name="post_tags">
    </div>
    <div class="form-group">
        <label for="cat-title">Content</label>
        <textarea class="form-control" type="text" id="" name="post_content" cols="20" rows="10">
            <?php echo $post_content ?>
        </textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Add Post">
    </div>
</form>