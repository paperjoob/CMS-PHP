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
                    // create query to select everything from the POSTS table
                    $query = "SELECT * FROM posts";
                
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