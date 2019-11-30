    <div class="col-md-4">

        <!-- Blog Search Well -->
        <div class="well">
            <h4>Blog Search</h4>
            <!-- FORM SEARCH -->
            <form action="search.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                <button name="submit" class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>
            </form> <!-- END FORM SEARCH -->
            <!-- /.input-group -->
        </div>


        <!-- Blog Categories Well -->
        <div class="well">

            <?php 
                // query from the database
                $query = "SELECT * FROM categories"; // to LIMIT the query, it would be LIMIT 3;
                // query mysql with the connection and query
                $select_categories_sidebar = mysqli_query($connection, $query);

                
            ?>

            <h4>Blog Categories</h4>
            <div class="row">
                <!-- bootstrap column 6 or 12 is how big the div would expand -->
                <div class="col-lg-12"> 
                    <ul class="list-unstyled">
                        <?php 
                            // display the categories with a WHILE LOOP
                            while($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                                // the result will be returned in an associative array
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                                // use double quotes for HTML brackets
                                // the category key GET value will be in the category.php to select any posts with that category
                                echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                            }
                        ?>
                    </ul>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div> <!-- end blog categories -->

        <!-- Side Widget Well -->
        <?php include "widget.php" ?>
        
    </div>