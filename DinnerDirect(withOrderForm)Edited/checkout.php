<?php
if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}
require_once("phpdata/databasephp.php");
//$db_handle = new DBConnect();
//$userIDpullorderdatainstance=$_SESSION['userID'];
echo $_SESSION['userID'];
if (empty($_SESSION['userID'])){
    echo '<script type="text/javascript"> alert("Please Log In Before Placing an Order");
    location="index.php";
</script>';
}
include 'header_layout.php';
?>


<head>
    <!-- Custom styles for this template -->
    <link href="css/menu2.css" rel="stylesheet" />

</head>
<body>

<div class="container">


    <!-- Side Bar -->
    <div class="row">
        <div class="col-lg-3">

            <br><br>
            <br><br>
            <div class="list-group">
                <a href="menu.php" class="list-group-item">Menu</a>
            </div>

        </div>
        <!-- /.Side Bar -->

        <!-- Menu -->
        <div class="col-lg-9">
            <br><br>
            <br><br>

            <!-- Shopping Cart -->
<!--            <h2 class="my-4">Shopping Cart</h2>-->
<!--            <hr>-->
<!---->
<!--            --><?php
//                $total_quantity = 0;
//                $total_price = 0;
//                ?>
<!--                <table class="cart" cellpadding="10" cellspacing="1">-->
<!--                    <tr bgcolor="#F0F0F0">-->
<!--                        <th style="text-align:left;">Name</th>-->
<!--                        <th style="text-align:left;">Code</th>-->
<!--                        <th style="text-align:right;" width="5%">Quantity</th>-->
<!--                        <th style="text-align:right;" width="15%">Unit Price</th>-->
<!--                        <th style="text-align:right;" width="15%">Price</th>-->
<!--                    </tr>-->
<!--                    --><?php
//                    foreach ($_SESSION["cart_item"] as $item){
//                        $item_price = $item["quantity"]*$item["price"];
//                        ?>
<!--                        <tr>-->
<!--                            <td><img src="--><?php //echo $item["image"]; ?><!--" class="cart-item-image" />--><?php //echo $item["name"]; ?><!--</td>-->
<!--                            <td>--><?php //echo $item["code"]; ?><!--</td>-->
<!--                            <td style="text-align:right;">--><?php //echo $item["quantity"]; ?><!--</td>-->
<!--                            <td  style="text-align:right;">--><?php //echo "$ ".$item["price"]; ?><!--</td>-->
<!--                            <td  style="text-align:right;">--><?php //echo "$ ". number_format($item_price,2); ?><!--</td>-->
<!--                        </tr>-->
<!--                        --><?php
//                        $total_quantity += $item["quantity"];
//                        $total_price += ($item["price"]*$item["quantity"]);
//                    }
//                    ?>
<!---->
<!--                    <tr>-->
<!--                        <td colspan="2" align="right">Total:</td>-->
<!--                        <td align="right">--><?php //echo $total_quantity; ?><!--</td>-->
<!--                        <td align="right" colspan="2"><strong>--><?php //echo "$ ".number_format($total_price, 2); ?><!--</strong></td>-->
<!--                        <td></td>-->
<!--                    </tr>-->
<!--                </table>-->
            <?php
            $_SESSION["checkout"] = 0;
            $_SESSION["additem"] = 0;
            include 'cart.php';
            ?>





            <!-- /.Shopping Cart -->

                <!--delivery time -->
                <div>


                    <?php
                    include  'deliverydate.php'; ?>


                </div>
                <!--/.delivery time-->
            </div>
            <!-- /.Shopping Cart -->

        </div>
        <!-- /.col-lg-9 -->
    </div>
    <!-- row -->
</div>
<!-- /.container -->


</body>


</html>