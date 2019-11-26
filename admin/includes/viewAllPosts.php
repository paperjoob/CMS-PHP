<table class="table table-bordered table-hover"> 
    <thead>
        <tr>
            <th>Post ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Content</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Edit Post</th>
            <th>Delete Post</th>
        </tr>
    </thead>
    <tbody>
            <?php 
                // query
                $query = "SELECT * FROM posts";
                $select_all_posts = mysqli_query($connection, $query);

                // while loop through to add each value in a row
                while($row = mysqli_fetch_assoc($select_all_posts)) {
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
                    // add image src and img class to make it responsive for bootstrap
                    echo "<tr>";
                        echo "<td>{$post_id}</td>";
                        echo "<td>{$post_title}</td>";
                        echo "<td>{$post_author}</td>";

                        // Find the Category name from the ID - relational tables in categories and posts tables
                        $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                        // query mysql with the connection and query
                        $select_categories_edit_id = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_categories_edit_id)) {
                        // the result will be returned in an associative array
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        }

                        echo "<td>{$cat_title}</td>";
                        echo "<td>{$post_status}</td>";
                        echo "<td><img src='../images/{$post_image}' width=150 class='img-responsive'></td>";
                        echo "<td>{$post_tags}</td>";
                        echo "<td>{$post_content}</td>";
                        echo "<td>{$post_comment_count}</td>";
                        echo "<td>{$post_date}</td>";
                        // edit post sourced to the $p_id= to the post_id of the specific post
                        echo "<td><a href='posts.php?source=editPost&p_id={$post_id}'>Edit</a></td>";
                        // delete a specific post by the post_id
                        echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>
    </tbody>
</table>

<?php 
    // if delete is set in the GET function
    if(isset($_GET['delete'])) {
        $post_id_to_delete = $_GET['delete'];
        // the query to delete where the post_id is equal to the id of the post to be deleted
        $query = "DELETE FROM posts WHERE post_id = $post_id_to_delete";
        // the delete query to be sent to the database
        $delete_query = mysqli_query($connection, $query);
    }

?>