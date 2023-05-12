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
            $query = "SELECT * FROM posts where post_status = 'published'";
            $select_all_posts = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_all_posts)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = substr($row['post_content'], 0, 100) . "...";
                $post_category_id = $row['post_category_id'];

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

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
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
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

            <?php } ?>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php" ?>

    </div>

    <hr>

    <?php include "includes/footer.php" ?>