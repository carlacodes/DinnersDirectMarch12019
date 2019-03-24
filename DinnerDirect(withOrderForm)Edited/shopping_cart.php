<?php
if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}

$Cart = "active";
include 'header_layout.php';
include 'cart_action.php';

?>
<head>
<!-- Custom styles for this template -->
<link href="css/menu.css" rel="stylesheet">
<link href="css/shop-homepage.css" rel="stylesheet">
<title>Shopping Cart</title>

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

</body>

<?php
include 'footer_layout.php';
?>

</html>