<?php
if ($_GET['p_id']) {
    $p_id = $_GET['p_id'];
    $select_query = "SELECT * FROM posts WHERE post_id = '{$p_id}'";
    $select_post_by_id = mysqli_query($connection, $select_query);
    confirmQuery($select_post_by_id);

    while ($row = mysqli_fetch_assoc($select_post_by_id)) {
        $post_id = $row['post_id'];
        $post_category_id = $row['post_category_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_status = $row['post_status'];
    }
}

if (isset($_POST['update_post'])) {
    $post_title        = $_POST['post_title'];
    $post_author       = $_POST['post_author'];
    $post_category_id  = $_POST['post_category_id'];
    $post_status       = $_POST['post_status'];
    $post_image        = $_FILES['image']['name'];
    $post_image_temp   = $_FILES['image']['tmp_name'];
    $post_tags         = $_POST['post_tags'];
    $post_content      = $_POST['post_content'];
    $post_date         = date('d-m-y');

    if (empty($post_image)) {
        $query = "SELECT * FROM posts WHERE post_id = $p_id ";
        $select_image = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($select_image)) {
            $post_image = $row['post_image'];
        }
    } else {
        move_uploaded_file($post_image_temp, "../images/$post_image");
    }

    $query = "UPDATE posts SET ";
    $query .= "post_title  = '{$post_title}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_date   =  now(), ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_tags   = '{$post_tags}', ";
    $query .= "post_content= '{$post_content}', ";
    $query .= "post_image  = '{$post_image}' ";
    $query .= "WHERE post_id = {$p_id} ";

    $update_post = mysqli_query($connection, $query);
    confirmQuery($update_post);

    echo "<p class='alert alert-success'>Post Updated! You can re-update below, if needed.</p>";
}

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="post_title" value="<?php echo $post_title ?>">
    </div>

    <div class="form-group">
        <label for="category">Category</label>
        <select class="form-control" name="post_category_id">
            <?php
            $query = "SELECT * FROM categories";
            $select_categories = mysqli_query($connection, $query);
            confirmQuery($select_categories);

            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                if ($post_category_id == $cat_id) {
                    echo "<option value='$cat_id' selected>{$cat_title}</option>";
                } else {
                    echo "<option value='$cat_id'>{$cat_title}</option>";
                }
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" name="post_author" value="<?php echo $post_author ?>">
    </div>

    <div class="form-group">
        <label for="title">Post Status</label>
        <select class="form-control" name="post_status" id="">
            <?php
            if ($post_status == "published") {
                echo "<option value='published' selected>Published</option>";
            } else {
                echo "<option value='published'>Published</option>";
            }

            if ($post_status == "draft") {
                echo "<option value='draft' selected>Draft</option>";
            } else {
                echo "<option value='draft'>Draft</option>";
            }
            ?>

        </select>
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <br>
        <img width='100' src="../images/<?php echo $post_image ?>" alt="image not found">
        <br>
        <br>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags ?>">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control " name="post_content" id="" cols="30" rows="10"><?php echo $post_content ?></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
    </div>

</form>