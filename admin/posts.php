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
                        </h1>
                        <?php 
                            if(isset($_GET['source'])) {
                                $source = $_GET['source'];

                            } else {
                                $source = '';
                            }
                            // if the source is equal to this, show this
                            // if we do not find any other get request, display ALL posts
                            switch($source) {
                                case 'addPosts';
                                    include "includes/addPosts.php";
                                    break;
                                case 'editPost';
                                    include "includes/editPost.php";
                                    break;
                                case '20';
                                    echo 'NICE 20';
                                    break;
                                case '5';
                                    echo 'NICE 5';
                                    break;
                                default:
                                    // by default, display the table with all posts
                                    include "includes/viewAllPosts.php";
                                break;
                            };
                        ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <!-- Include footer.php -->
        <?php include "includes/admin_footer.php" ?>