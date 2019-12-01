<table class="table table-bordered table-hover"> 
    <thead>
        <tr>
            <th>Comment ID</th>
            <th>Author</th>
            <th>Email</th>
            <th>Content</th>
            <th>Status</th>
            <th>Date</th>
            <th>In Response To: </th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
            <?php 
                // query to select all from comments table
                $query = "SELECT * FROM comments";
                $select_all_comments = mysqli_query($connection, $query);

                // while loop through to add each value in a row
                while($row = mysqli_fetch_assoc($select_all_comments)) {
                    $comment_id = $row['comment_id'];
                    $comment_post_id = $row['comment_post_id'];
                    $comment_author = $row['comment_author'];
                    $comment_email = $row['comment_email'];
                    $comment_content = $row['comment_content'];
                    $comment_status = $row['comment_status'];
                    $comment_date = $row['comment_date'];
                    echo "<tr>";
                        echo "<td>{$comment_id}</td>";
                        echo "<td>{$comment_author}</td>";
                        echo "<td>{$comment_email}</td>";
                        echo "<td>{$comment_content}</td>";

                        // $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                        // // query mysql with the connection and query
                        // $select_categories_edit_id = mysqli_query($connection, $query);

                        // while($row = mysqli_fetch_assoc($select_categories_edit_id)) {
                        // // the result will be returned in an associative array
                        // $cat_id = $row['cat_id'];
                        // $cat_title = $row['cat_title'];
                        // }

                        echo "<td>{$comment_status}</td>";
                        echo "<td>{$comment_date}</td>";
                        echo "<td>In Response To</td>";
                        // approve the comment
                        echo "<td><a href='posts.php?source=editPost&p_id='>Approve</a></td>";
                        // unapprove the comment
                        echo "<td><a href='posts.php?delete='>Unapprove</a></td>";
                        // edit post sourced to the $p_id= to the post_id of the specific post
                        echo "<td><a href='posts.php?source=editPost&p_id='>Edit</a></td>";
                        // delete a specific post by the post_id
                        echo "<td><a href='posts.php?delete='>Delete</a></td>";
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