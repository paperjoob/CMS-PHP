<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Clicking on this link brings you to the home page -->
                <a class="navbar-brand" href="index.php">Learn PHP and Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <?php 
                        // query from the database
                        $query = "SELECT * FROM categories";
                        // query mysql with the connection and query
                        $select_all_categories_query = mysqli_query($connection, $query);

                        // display the categories with a WHILE LOOP
                        while($row = mysqli_fetch_assoc($select_all_categories_query)) {
                            // the result will be returned in an associative array
                            $cat_title = $row['cat_title'];
                            // use double quotes for HTML brackets
                            echo "<li><a href='#'>{$cat_title}</a></li>";
                        }
                    ?>
                    <!-- Add Admin page to the Navigation Bar -->
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>