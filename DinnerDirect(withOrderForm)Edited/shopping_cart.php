<?php
session_start();

$Cart = "active";
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


            <!-- Shopping Cart -->
            <?php
            $_SESSION["checkout"] = 1;
            $_SESSION["additem"] = 1;
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