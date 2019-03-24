<?php
if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}


$Order = "active";
include 'header_layout.php';
include 'cart_action.php';

?>

<head>
<!-- Custom styles for this template -->
<link href="css/shop-homepage.css" rel="stylesheet">
<link href="css/menu.css" rel="stylesheet">

<!-- Icon style -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>Order</title>


</head>

<body>


<div class="container">


    <!-- Side Bar -->
    <div class="row">
        <div class="col-lg-3">

        </div>
        <!-- /.Side Bar -->




        <div class="col-lg-9">
            <br><br>

            <!-- Search bar -->
            <!-- reference codes from https://www.youtube.com/watch?v=PBLuP2JZcEg -->
            <form class="mt-4" action="menu.php" method="post">
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" placeholder="Search" name="search">
                    <div class="input-group-btn">
                        <button class="btn btn-default btn-lg" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
            <?php
            require_once("dbConnect.php");
            $db_handle = new DBConnect();
            $conn = $db_handle -> connectDB();

            if(isset($_POST['search'])){
                $search = $_POST['search']; 

                $search_query = "SELECT * FROM mealdeal WHERE description LIKE '%$search%' or name LIKE '%$search%'";

                $result = mysqli_query($conn, $search_query);


                $count = mysqli_num_rows($result);
                if($count == 0){
                    ?>

                    <h2 class="my-4">Search Results</h2>
                    <hr>
                        <p>No Results</p>


                    <?php

                }
                else{?>
                    <h2 class="my-4">Search Results</h2>
                        <hr>
                        <div class="row">

                    <?php while($row = mysqli_fetch_array($result)){
                        $meal_name = $row['name'];
                        $meal_descp = $row['description'];
                        $meal_ID = $row['ID'];
                        $meal_image = $row['image'];
                        $meal_code = $row['code'];
                        $meal_price = $row['price']; ?>
                        <!-- reference codes from https://phppot.com/php/simple-php-shopping-cart/ -->
                            <div class="col-lg-4 col-md-6 mb-4" >
                                <form method="post" action="menu.php?action=add&code=<?php echo $meal_code; ?>">

                                    <div class="card">
                                        <div class="card-transition">
                                            <img class="card-img-top" style="height: 200px;" src="<?php echo $meal_image; ?>" alt="<?php echo $meal_image; ?>">
                                            <div class="overlay">
                                                <div class="text"><?php echo $meal_descp; ?></div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title"><?php echo $meal_name; ?></h4>
                                            <h5><?php echo "$".$meal_price; ?></h5>
                                            <div class="card-footer">
                                                <div class="cart-action">
                                                    <select class="product-quantity" name="quantity">
                                                        <option selected="selected">1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                    <input type="submit" value="Add to Cart" class="btnAddAction"/></div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>


                    <?php }
                    mysqli_free_result($result);
                    mysqli_close($conn);
                    ?>
                        </div>
            <?php
                }
            }


            ?>
            <!-- /.Search Bar -->

            <!-- Menu -->
            <h2 class="my-4">Products</h2>
            <hr>
            <div class="row">
                <?php
                $product_array = $db_handle->runQuery("SELECT * FROM mealdeal ORDER BY id ASC");
                if (!empty($product_array)) {
                    foreach($product_array as $key=>$value){
                        ?>

                        <div class="col-lg-4 col-md-6 mb-4" >
                            <form method="post" action="menu.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">

                                <div class="card">
                                    <div class="card-transition">
                                        <img class="card-img-top" style="height: 200px;" src="<?php echo $product_array[$key]["image"]; ?>" alt="<?php echo $product_array[$key]["image"]; ?>">
                                        <!-- reference codes from https://www.w3schools.com/howto/howto_css_image_overlay.asp -->
                                        <div class="overlay">
                                            <div class="text"><?php echo $product_array[$key]["description"]; ?></div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $product_array[$key]["name"]; ?></h4>
                                        <h5><?php echo "$".$product_array[$key]["price"]; ?></h5>
                                        <div class="card-footer">
                                            <div class="cart-action">
                                                <select class="product-quantity" name="quantity">
                                                    <option selected="selected">1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                                <input type="submit" value="Add to Cart" class="btnAddAction"/></div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

                        <?php
                    }
                }
                ?>

            </div>

            <!-- Shopping Cart -->
            <?php
            $_SESSION["checkout"] = 1;
            $_SESSION["additem"] = 0;
            include 'cart.php';
            ?>

            <!-- /.Shopping Cart -->

        </div>
        <!-- /.col-lg-9 -->
    </div>
    <!-- row -->
</div>
<!-- /.container -->
</body>

<?php
include 'footer_layout.php';
?>

</html>