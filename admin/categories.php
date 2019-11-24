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
                            Categories
                            <small>Author</small>
                        </h1>
                        <!-- Add Category Form col-xs-6 takes up half of the page -->
                        <div class="col-xs-6">
                            <form action="">
                                <div class="form-group">
                                    <label for="cat-title">Category Title</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>
                        </div> <!-- End of Add Category Form -->
                        <!-- Beginning of Table Category Div -->
                        <div class="col-xs-6">
                            <?php 
                                // query from the database
                                $query = "SELECT * FROM categories"; // to LIMIT the query, it would be LIMIT 3;
                                // query mysql with the connection and query
                                $select_categories_admin = mysqli_query($connection, $query);

                                
                            ?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        // display the categories with a WHILE LOOP
                                        while($row = mysqli_fetch_assoc($select_categories_admin)) {
                                            // the result will be returned in an associative array
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];
                                            // use double quotes for HTML brackets
                                            echo "<tr>";
                                            echo "<td>{$cat_id}</td>";
                                            echo "<td>{$cat_title}</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div> <!-- End of Category Table Div -->
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <!-- Include footer.php -->
        <?php include "includes/admin_footer.php" ?>