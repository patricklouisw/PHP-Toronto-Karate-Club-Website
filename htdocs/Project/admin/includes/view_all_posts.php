<?php
if (isset($_GET['delete'])) {
    $post_id = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id={$post_id}";
    $del_post = mysqli_query($connection, $query);
    if (!$del_post) {
        die("QUERY FAILED: " . mysqli_error($connection));
    }
}
?>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Category_id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Date</th>
            <th>Image</th>
            <th>Content</th>
            <th>Tags</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $select_query = "SELECT * FROM posts";
        $select_posts = mysqli_query($connection, $select_query);
        if (!$select_posts) {
            die("QUERY FAILED: " . mysqli_error($connection));
        }

        while ($row = mysqli_fetch_assoc($select_posts)) {
            $post_id = $row['post_id'];
            $post_category_id = $row['post_category_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = substr($row['post_content'], 0, 50) . " ...";
            $post_tags = $row['post_tags'];
            $post_status = $row['post_status'];

            $query = "SELECT cat_title FROM categories WHERE cat_id={$post_category_id}";
            $select_by_cat_id = mysqli_query($connection, $query);
            confirmQuery($select_by_cat_id);
            $row = mysqli_fetch_assoc($select_by_cat_id);
            if (mysqli_num_rows($select_by_cat_id) < 1) {
                $cat_title = "<span class='badge alert-danger'>Invalid Category</span>";
            } else {
                $cat_title = "<span class='badge alert-success'>{$row['cat_title']}</span>";
            }

            echo "<tr>
                <td>{$post_id}</td>
                <td>{$cat_title}</td>
                <td>{$post_title}</td>
                <td>{$post_author}</td>
                <td>{$post_date}</td>
                <td><img width='100' src='../images/{$post_image}' alt='image'></td>
                <td>{$post_content}</td>
                <td>{$post_tags}</td>
                <td>{$post_status}</td>
                <td><a href='posts.php?source=edit_post&p_id={$post_id}'>Update</a></td>
                <td><a href='posts.php?delete={$post_id}'>Delete</a></td>
            </tr>";
        }
        ?>
    </tbody>
</table>