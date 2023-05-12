<?php // CLICK UPDATE & SHOW A CATEGORY FORM
if (isset($_GET['update'])) {
    $cat_id = $_GET['update'];
    $cat_title = $_GET['category'];

    echo "
    <form action='' method='post'>
        <div class='form-group'>
            <label for='cat-title'>Update Category</label>
            <input class='form-control' type='text' name='cat_title' value='{$cat_title}'>
            <input type='hidden' name='cat_id' value='{$cat_id}'>
        </div>
        <div class='form-group'>
            <input class='btn btn-secondary' type='submit' name='update' value='Update Category'>
        </div>
    </form>
    ";
}

if (isset($_POST['update'])) { // UPDATE A CATEGORY
    $cat_id = $_POST['cat_id'];
    $cat_title = $_POST['cat_title'];

    $update_query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = {$cat_id};";
    $update_categories = mysqli_query($connection, $update_query);
    if (!$update_categories) {
        die("QUERY FAILED: " . mysqli_error($connection));
    } else {
        header("Location: categories.php");
    }
}
