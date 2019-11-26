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
                        </h1>
                        <!-- Add Category Form col-xs-6 takes up half of the page -->
                        <div class="col-xs-6">
                            <?php 
                                insert_categories(); // add insert_categories function from functions.php to ADD A NEW CATEGORY
                            ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Category Title</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>
            
                            <?php 
                                // UPDATE Query
                                if(isset($_GET['edit'])) {
                                    $cat_id = $_GET['edit'];

                                    include "includes/update_categories.php";
                                }
                            ?>
                        </div> <!-- End of Add Category Form -->
                        <!-- Beginning of Table Category Div -->
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    // find ALL Categories from functions.php
                                    findAllCategories();
                                ?>

                                <?php 
                                    // DELETE QUERY from functions.php
                                    deleteCategory();
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