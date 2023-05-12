<?php

function confirmQuery($result)
{
    global $connection;
    if (!$result) {
        die("QUERY FAILED: " . mysqli_error($connection));
    }
}

function insert_categories()
{
    global $connection;

    if (isset($_POST["submit"])) {
        $cat_title = $_POST["cat_title"];

        if ($cat_title == "" || empty($cat_title)) {
            echo "This field should not be empty";
        } else {
            $query = "INSERT INTO categories(cat_title) VALUE ('{$cat_title}')";
            $create_category_query = mysqli_query($connection, $query);
            confirmQuery($create_category_query);
        }
    }
}

function find_all_categories()
{

    global $connection;

    $select_query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $select_query);
    if (!$select_categories) {
        die("QUERY FAILED: " . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>
                <td>{$cat_id}</td>
                <td>{$cat_title}</td>
                <td><a href='categories.php?delete={$cat_id}'>Delete</a></td>
                <td><a href='categories.php?update={$cat_id}&category={$cat_title}'>Update</a></td>
            </tr>";
    }
}

function delete_category()
{
    global $connection;

    if (isset($_GET['delete'])) {
        $cat_id = $_GET['delete'];

        //Delete Category in Database
        $del_query = "DELETE FROM categories WHERE cat_id={$cat_id}";
        $del_categories = mysqli_query($connection, $del_query);
        confirmQuery($del_categories);

        //Update All post with that category to draft mode
        $update_post_query = "UPDATE posts SET post_status='draft' WHERE post_category_id=$cat_id;";
        $update_post_result = mysqli_query($connection, $update_post_query);
        confirmQuery($update_post_result);

        header("Location: categories.php");
    }
}
