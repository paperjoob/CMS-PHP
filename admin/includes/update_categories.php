<form action="" method="post">
    <div class="form-group">
        <label for="cat-title">Edit Category</label>
            <?php 
                if(isset($_GET['edit'])) {
                    $cat_id = $_GET['edit'];
                    // FIND ALL Categories Query from the database
                    $query = "SELECT * FROM categories WHERE cat_id = {$cat_id} "; // to LIMIT the query, it would be LIMIT 3;
                    // query mysql with the connection and query
                    $select_categories_edit_id = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($select_categories_edit_id)) {
                        // the result will be returned in an associative array
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];

                        ?>
                        <input value="<?php if(isset($cat_title)) {echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">
                    <?php } ?>
                <?php }
            ?>

            <?php 
                // UPDATE CATEGORY QUERY
                if(isset($_POST['update_category'])) {
                    $cat_update_title = $_POST['cat_title'];
                    // create Delete query
                    $query = "UPDATE categories SET cat_title = '{$cat_update_title}' WHERE cat_id = {$cat_id}";
                    $update_category_query = mysqli_query($connection, $query);
                    // refreshes the page upon Deleting an item
                    header("Location: categories.php");
                    if(!$update_category_query) {
                        die("QUERY TO UPDATE FAILED" . mysqli_error($connection));
                    }
                }
            
            ?>
        <!-- <input class="form-control" type="text" name="cat_title"> -->
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update">
    </div>
</form>