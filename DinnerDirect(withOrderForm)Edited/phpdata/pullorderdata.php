<?php
session_start();

$MyAccount = 'active';
include 'header_layout2.php';
require_once('databasephp.php');
$connection = connectToDb();
session_start();

//$srch_term = $_GET['srch-term'] ?? '1'; //PHP 7.0
//$srch= $_GET['srch-term'] ?? '1'; //dataphp 7.0
//echo "$srch";

$userIDpullorderdatainstance=$_SESSION['userID'];//$y is any declared variable
//echo $userIDpullorderdatainstance;


$query = "SELECT cus.first_name, cus.last_name, ordspec.order_date, ordspec.price, orderitem.quantity, orderitem.item_id, ordspec.order_id, mealdeal.name, mealdeal.ID, ordspec.date, ordspec.time FROM orderlist ordspec 
JOIN customers cus on ordspec.customer_id = cus.customerID
JOIN orderitem ON ordspec.order_id = orderitem.order_id
JOIN mealdeal ON orderitem.item_id = mealdeal.ID
WHERE ordspec.customer_id = '" . $userIDpullorderdatainstance."'";

$query3 = "SELECT first_name, last_name FROM customers
WHERE customers.customerID = '" . $userIDpullorderdatainstance."'";


//search database
//check if the variable has not been initalized
$result = mysqli_query($connection, $query);
$result2 = mysqli_query($connection, $query);
$result3 = mysqli_query($connection, $query3);

if (empty($result)){
    exit("databasePhp query failed, the result does not exist.");
}

// Close the connection
mysqli_close($connection);
?>

<head>

    <!-- Custom styles for this template -->
    <link href="../css/shop-homepage.css" rel="stylesheet">
    <link href="../css/menu.css" rel="stylesheet">
    <title>My Account</title>

</head>

<body>



<!-- Page Content -->
<div class="container">
    <br><br>
    <?php
    if(!empty($_SESSION["userID"]))
    { ?>
        <h2 class="my-4">Past Orders</h2>

    <table class="table" >

            <tr>
                <th>Name</th>
            </tr>
            <tr>
                <td><?php //print_r($user2);
                    $names = ($result2->fetch_assoc()); //instance var to just get the first and last name
                    $names3 = ($result3->fetch_assoc());
                    echo $names3['first_name'] . " " . $names3['last_name'] ?></td>
            </tr>


            <tr>
                <th>Order ID</th>
                <th>Order item</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Date ordered</th>
                <th>Delivery Date</th>
                <th>Delivery Time</th>

            </tr>
            <?php while ($user = mysqli_fetch_assoc($result)) { ?>

                <tr>
                    <td><?php echo $user['order_id'] ?></td>
                    <td><?php print_r($user['name']) ?> </td>
                    <td><?php echo $user['quantity'] ?></td>
                    <td><?php echo $user['price'] ?></td>
                    <td><?php echo $user['order_date'] ?></td>
                    <td><?php echo $user['date'] ?></td>
                    <td><?php echo $user['time'] ?></td>

                </tr>

            <? } ?>

    </table>
    <?php
    }
    else {?>
        <h2 class="my-4">Please Login</h2>
    <a id="btnLogin" href="../login.php">Login Here!</a>
    <?}?>
    <div class="row">

    </div>
    <?php
    // Free the results from memory
    //unset all variables
//at the start of every page runs that code
    mysqli_free_result($result);
    mysqli_free_result($result2);

    //session_destroy();

    ?>

</div>


<!-- /.container -->


<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>


