<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>

<!-- Navigation -->
<?php include "includes/navigation.php" ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php

            if (isset($_GET['p_id'])) {
                $post_id = $_GET['p_id'];
            }

            $query = "SELECT * FROM posts WHERE post_id = '{$post_id}' AND post_status='published'";
            $select_all_posts = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_all_posts)) {
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_category_id = $row['post_category_id'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];

                $query = "SELECT cat_title FROM categories WHERE cat_id={$post_category_id}";
                $select_by_cat_id = mysqli_query($connection, $query);
                if (!$select_by_cat_id) {
                    die("QUERY FAILED: " . mysqli_error($connection));
                }
                $row = mysqli_fetch_assoc($select_by_cat_id);
                $post_category = $row['cat_title'];

            ?>

                <h1 class="page-header">
                    Toronto Karate Club
                    <small>Announcement & Blog</small>
                </h1>
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <p><span class="glyphicon glyphicon-tags"></span> Category on <span class='badge alert-info'><?php echo $post_category ?></span></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="http://placehold.it/900x300">
                <hr>
                <p><?php echo $post_content ?></p>

                <hr>

            <?php } ?>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php" ?>

    </div>

    <hr>

    <?php include "includes/footer.php" ?>