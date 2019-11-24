<?php 
    function insert_categories() {
        // add in the GLOBAL connection to the database
        global $connection;
        // if submit is clicked
        if(isset($_POST["submit"])) {
            $cat_title = $_POST['cat_title'];
            // echo $cat_title;
            // input validation
            if($cat_title == "" | empty($cat_title)) {
                echo "This field should not be empty.";
            } else { // if not empty, create the post inside our database
                $query = "INSERT INTO categories (cat_title)";
                $query .= "VALUES ('{$cat_title}')";
                // pass in query to the database
                $create_category = mysqli_query($connection, $query);
                // if create_category did not post, kill the process and show error
                if(!$create_category) {
                    die('Query Post in Add Category Failed' . mysqli_error($connection));
                } else {
                    header("Location: categories.php");
                    exit;
                }
            }
        }
    }; // end function

    function findAllCategories() {
        // add in the GLOBAL connection to the database
        global $connection;
        // FIND ALL Categories Query from the database
        $query = "SELECT * FROM categories"; // to LIMIT the query, it would be LIMIT 3;
        // query mysql with the connection and query
        $select_categories_admin = mysqli_query($connection, $query);

        // display the categories with a WHILE LOOP
        while($row = mysqli_fetch_assoc($select_categories_admin)) {
            // the result will be returned in an associative array
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            // use double quotes for HTML brackets
            echo "<tr>";
            echo "<td>{$cat_id}</td>";
            echo "<td>{$cat_title}</td>";
            echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
            echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
            echo "</tr>";
        }
    } // end findAllCategories

    function deleteCategory() {
        // add in the GLOBAL connection to the database
        global $connection;
        if(isset($_GET['delete'])) {
            $cat_id_delete = $_GET['delete'];
            // create Delete query
            $query = "DELETE FROM categories WHERE cat_id = {$cat_id_delete}";
            $delete_category_query = mysqli_query($connection, $query);
            // refreshes the page upon Deleting an item
            header("Location: categories.php");
        }
    } // end deleteCategory

?>