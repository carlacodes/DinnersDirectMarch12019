<?php
session_start();




include 'header_layout.php';
//include 'cart_action.php';

?>

    <!-- Custom styles for this template -->
    <link href="css/menu2.css" rel="stylesheet">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <title>Order</title>


    </head>
    <body>

<h2 class="my-4">Shopping Cart</h2>
<hr>

<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
    ?>
    <table class="cart" cellpadding="10" cellspacing="1">
        <tr bgcolor="#F0F0F0">
            <th style="text-align:left;">Name</th>
            <th style="text-align:left;">Code</th>
            <th style="text-align:right;" width="5%">Quantity</th>
            <th style="text-align:right;" width="15%">Unit Price</th>
            <th style="text-align:right;" width="15%">Price</th>
<!--            <th style="text-align:center;" width="5%">Remove</th>-->
            <?php if($_SESSION["checkout"] == 1){?>
                <th style="text-align:center;" width="5%">Remove</th>
            <?php } ?>


        </tr>
        <?php
        foreach ($_SESSION["cart_item"] as $item){
            $item_price = $item["quantity"]*$item["price"];
            ?>
            <tr>
                <td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
                <td><?php echo $item["code"]; ?></td>
                <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                <td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
                <td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
<!--                <td style="text-align:center;"><a href="menu.php?action=remove&code=--><?php //echo $item["code"]; ?><!--" ><img class="btnRemoveAction" src="img/delete.png" alt="Remove Item"/></a></td>-->
                <?php if($_SESSION["checkout"] == 1){?>
                    <td style="text-align:center;"><a href="menu.php?action=remove&code=<?php echo $item["code"]; ?>" ><img name="Remove" class="btnRemoveAction" src="img/delete.png" alt="Remove Item" /></a></td>
                <?php } ?>
            </tr>
            <?php
            $total_quantity += $item["quantity"];
            $total_price += ($item["price"]*$item["quantity"]);
        }
        ?>

        <tr>
            <td colspan="2" align="right">Total:</td>
            <td align="right"><?php echo $total_quantity; ?></td>
            <td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
            <td></td>
        </tr>
    </table>
    <?php
} else {
    ?>
    <div class="no-records">Your Cart is Empty</div>
    <?php
}

if($_SESSION["checkout"] == 1 && $_SESSION["additem"] == 0 && !empty($_SESSION["cart_item"])) {
    ?>
    <a href="checkout.php" id="btnCart" name="Checkout">Checkout</a>
    <a id="btnCart" href="menu.php?action=empty" name="Empty">Empty Cart</a>

    <?php
}

elseif($_SESSION["checkout"] == 1 && $_SESSION["additem"] == 1 && !empty($_SESSION["cart_item"])) {
    ?>
    <a href="checkout.php" id="btnCart" name="Checkout">Checkout</a>
    <a id="btnCart" href="shopping_cart.php?action=empty" name="Empty">Empty Cart</a>

    <?php
}

if($_SESSION["checkout"] == 0) {
?>
<a href="menu.php" id="btnCart" name="Edit">Edit Cart</a>

<?php
            }

if($_SESSION["additem"] == 1 && empty($_SESSION["cart_item"])) {
    ?>
    <a href="menu.php" id="btnCart" name="Add">Add Item</a>

    <?php
}
?>




    </body>
</html>
