<?php
if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}
if (empty($_SESSION['userID'])){
    echo '<script type="text/javascript"> alert("Please login first!"); location="../index.php";</script>';
}

$MyAccount = 'active';
include 'header_layout2.php';
require_once('databasephp.php');
$connection = connectToDb();

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
    <script type="text/javascript" src='tablesearch.js'> </script>
    <style>
        #myInput {
            background-image: url('/css/searchicon.png'); /* Add a search icon to input */
            background-position: 10px 12px; /* Position the search icon */
            background-repeat: no-repeat; /* Do not repeat the icon image */
            width: 100%; /* Full-width */
            font-size: 16px; /* Increase font-size */
            padding: 12px 20px 12px 40px; /* Add some padding */
            border: 1px solid #ddd; /* Add a grey border */
            margin-bottom: 12px; /* Add some space below the input */
        }

        #myUL {
            /* Remove default list styling */
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        #myUL li a {
            border: 1px solid #ddd; /* Add a border to all links */
            margin-top: -1px; /* Prevent double borders */
            background-color: #f6f6f6; /* Grey background color */
            padding: 12px; /* Add some padding */
            text-decoration: none; /* Remove default text underline */
            font-size: 18px; /* Increase the font-size */
            color: black; /* Add a black text color */
            display: block; /* Make it into a block element to fill the whole list */
        }

        #myUL li a:hover:not(.header) {
            background-color: #eee; /* Add a hover effect to all links, except for headers */
        }
    </style>
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

    <input type="text" id="myInput" onkeyup="tablesearchorderitemid()" placeholder="Search for Order ID..">
        <input type="text" id="myInput2" onkeyup="tablesearchorderitem()" placeholder="Search for Set Type..">
        <input type="text" id="myInput3" onkeyup="tablesearchorderquantity()" placeholder="Search for Quantity..">
        <input type="text" id="myInput4" onkeyup="tablesearchordertotalprice()" placeholder="Search for Total Price..">
        <input type="text" id="myInput5" onkeyup="tablesearchdateordered()" placeholder="Search for Date Ordered..">
        <input type="text" id="myInput6" onkeyup="tablesearchdeliverydate()" placeholder="Search for Delivery Date..">
        <input type="text" id="myInput7" onkeyup="tablesearchdeliverytime()" placeholder="Search for Delivery Time..">

        <table class="table" id="myTable" >

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

            <?php } ?>

    </table>


    <?php
    }
    else {?>
        <h2 class="my-4">Please Login</h2>
    <a id="btnLogin" href="../login.php">Login Here!</a>
    <?php }?>
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


