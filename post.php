<!-- connect to the Database -->
<?php include "includes/db.php"; ?>
  <!-- header -->
    <?php 
        include "includes/header.php";
    ?>
    <!-- Navigation -->
    <?php 
        include "includes/navigation.php";
    ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php 

                    // if the GET value of post id is set
                    if(isset($_GET['p_id'])) {
                        $get_post_id = $_GET['p_id'];
                    }

                    // create query to select everything from the POSTS table
                    $query = "SELECT * FROM posts WHERE post_id = $get_post_id";
                
                    $select_all_posts_query = mysqli_query($connection, $query);

                    // display the categories with a WHILE LOOP
                    while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                        // the result will be returned in an associative array
                        // create variables for each post key value
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];

                        // close PHP tag to include HTML
                        ?>

                        <h1 class="page-header">
                            Page Heading
                            <small>Secondary Text</small>
                        </h1>

                        <!-- First Blog Post -->
                        <h2>
                            <!-- insert the variables to each corresponding value -->
                            <a href="#"><?php echo $post_title ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image?>" alt="post image">
                        <hr>
                        <p><?php echo $post_content ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <hr>
                        
                        
                        <?php
                        // close the PHP while loop tag
                    }
                    
                ?>

        <!-- Blog Comments -->

            <?php 
                // if create_comment is set, post this
                if(isset($_POST['create_comment'])) {   
                    // grab the post id from the url in the GET super global
                    $get_post_id = $_GET['p_id'];
                    // assign variables to the posted author, email, content
                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_content'];

                    // query to insert/post
                    $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
                    $query .= "VALUES ($get_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";
                
                    // connect query and the database together
                    $create_comment_query = mysqli_query($connection, $query);
                    // if query fails, kill it
                    if(!$create_comment_query) {
                        die('Query failed to POST comment' . mysqli_error($connection));
                    }
                
                }   
            
            
            ?>
        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>
            <form action="" method="post" role="form">
                <div class="form-group">
                    <label for="Author">Author</label>
                    <input class="form-control" type="text" name="comment_author">
                </div>
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input class="form-control" type="email" name="comment_email">
                </div>
                <div class="form-group">
                    <label for="Comment">Comment</label>
                    <textarea class="form-control" rows="3" name="comment_content"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
            </form>
        </div>

        <hr>

        <!-- Posted Comments -->

        <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>

        <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                <!-- Nested Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Nested Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
                <!-- End Nested Comment -->
            </div>
        </div>

        </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php 
                include "includes/sidebar.php";
            ?>
            <!-- /.row -->

            <hr>
            <?php 
                include "includes/footer.php";
            ?>