<?php include "includes/adminheader.php" ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Posts
                            <small>Author</small>
                        </h1>
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
                                    <th>Comments</th>
                                    <th>Date</th>
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
                                            $post_comment_count = $row['post_comment_count'];
                                            $post_date = $row['post_date'];
                                            // add image src and img class to make it responsive for bootstrap
                                            echo "<tr>";
                                                echo "<td>{$post_id}</td>";
                                                echo "<td>{$post_title}</td>";
                                                echo "<td>{$post_author}</td>";
                                                echo "<td>{$post_category_id}</td>";
                                                echo "<td>{$post_status}</td>";
                                                echo "<td><img src='../images/{$post_image}' width=150 class='img-responsive'></td>";
                                                echo "<td>{$post_tags}</td>";
                                                echo "<td>{$post_comment_count}</td>";
                                                echo "<td>{$post_date}</td>";
                                            echo "</tr>";
                                        }
                                    
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <!-- Include footer.php -->
        <?php include "includes/admin_footer.php" ?>