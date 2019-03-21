<?php
session_start();



$Order = "active";
include 'header_layout.php';
include 'cart_action.php';

?>

    <!-- Custom styles for this template -->
    <link href="css/menu2.css" rel="stylesheet">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <title>Order</title>


</head>
<body>


<div class="container">


    <!-- Side Bar -->
    <div class="row">
        <div class="col-lg-3">


        </div>
        <!-- /.Side Bar -->

        <!-- Menu -->
        <div class="col-lg-9">
            <br><br>

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

<?php
include 'footer_layout.php';
?>

</html>