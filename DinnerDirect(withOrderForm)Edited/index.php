<?php
session_start();

$home_active = "active";
include 'header_layout.php';

?>

<head>
    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <title>Home</title>

</head>




<!-- Page Content -->

<div class="container">


    <div class="row">

        <div class="col-lg-3">

            <h2 class="my-4">Welcome to DinnersDirect</h2>
            <div class="list-group">
                <h5><a href="menu.php">Menu</a></h5>

            </div>
            <hr>

            <?php

            if(!empty($_SESSION["userID"]))
            {
                echo "Hello ".$_SESSION['userFirstName'];
            }
            else
            { ?>
                <?= '<h2 class="my-4">Login</h2>


            <form method="post" action="phpdata/logincheck.php" >
                <fieldset >
                    <legend>Customer Log In</legend>
                    Your Email:<br>
                    <input type="email" name="email" required><br>
                    Your password:<br>
                    <input type="password" name="password" required><br>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Submit" required>
                </fieldset>
            </form>

' ?>

            <?php } ?>


        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="img/frontpage900.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="row">

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="https://i.imgur.com/9TwJKfV.jpg" alt="Croissant">
                        <div class="card-body">
                            <h4 class="card-title">
                                Croissant
                            </h4>
                            <h5>£1.30</h5>
                            <p class="card-text">Breakfast pastry, prefect for a rush morning!</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9733;</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="https://i.imgur.com/ncYf27F.jpg" alt="Donuts">
                        <div class="card-body">
                            <h4 class="card-title">
                                Donuts
                            </h4>
                            <h5>£2.00</h5>
                            <p class="card-text">Colourful glazed donuts for sweet cravings.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="https://i.imgur.com/opKASPl.jpg" alt="">
                        <div class="card-body">
                            <h4 class="card-title">
                                Fruit Cake
                            </h4>
                            <h5>£3.50</h5>
                            <p class="card-text">Delicious creamy layered cake topped with a strawberry !</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="https://i.imgur.com/pt2WDxj.jpg" alt="">
                        <div class="card-body">
                            <h4 class="card-title">
                                Stir Fried Flat Rice Noodles
                            </h4>
                            <h5>£7.00</h5>
                            <p class="card-text">Stir fried over high heat with soy sauce</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="https://i.imgur.com/lDyqZbg.jpg" alt="">
                        <div class="card-body">
                            <h4 class="card-title">
                                Gamberi Spaghetti
                            </h4>
                            <h5>£9.50</h5>
                            <p class="card-text">Pasta with tomato sauce with gently cooked prawns</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="https://i.imgur.com/400kbjs.jpg?1" alt="">
                        <div class="card-body">
                            <h4 class="card-title">
                                Kimchi Fried Rice
                            </h4>
                            <h5>£8.50</h5>
                            <p class="card-text">Stir fried well-fermented kimchi with chilled rice topped with a sunny side up!</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<?php
include 'footer_layout.php';
?>

</html>
