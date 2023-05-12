<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>

<!-- Navigation -->
<?php include "includes/navigation.php" ?>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <h1 class="page-header">
            Toronto Karate Club's Shop
            <small>Our Equipment</small>
        </h1>
    </div>

    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
            <img class="img-responsive" src="https://bushido.ca/wp-content/uploads/2017/03/UNI1009WHE-Student-Basic.jpg" alt="...">
            <div class="caption">
                <h4>White Karate Gi</h4>
                <p>$10.00</p>
            </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
            <img class="img-responsive" src="https://bushido.ca/wp-content/uploads/2017/03/UNI1000-LW-Traditional-Black.jpg" alt="...">
            <div class="caption">
                <h4>Black Karate Gi</h4>
                <p>$20.00</p>
            </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
            <img class="img-responsive" src="https://bushido.ca/wp-content/uploads/2017/10/Drako-MW-Poly-Cotton-Red.jpg" alt="...">
            <div class="caption">
                <h4>Red Karate Gi</h4>
                <p>$30.00</p>
            </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2>Send a purchase request below!</h2>
            <form action="/cgi-bin/receipt.py" method="post" enctype="multipart/form-data" target="_blank">

                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" class="form-control" name="buyer_name">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="buyer_email">
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="white">Amount White Karate Gi</label>
                            <input type="number" class="form-control" name="white" value="0" min="0">
                        </div>
                        <div class="col-md-4">
                            <label for="black">Amount Black Karate Gi</label>
                            <input type="number" class="form-control" name="black" value="0" min="0">
                        </div>
                        <div class="col-md-4">
                            <label for="red">Amount Red Karate Gi</label>
                            <input type="number" class="form-control" name="red" value="0" min="0">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="buy" value="Calculate Cost + Receipt">
                </div>

            </form>
        </div>

    </div>

    <hr>

    <?php include "includes/footer.php" ?>