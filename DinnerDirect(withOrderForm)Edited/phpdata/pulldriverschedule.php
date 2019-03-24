<?php
if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}
$MyAccount = 'active';
//include 'header_layout2.php';
require_once('databasephp.php');
$connection = connectToDb();
session_start();

$driverschoolIDpullorderdatainstance=$_SESSION['schoolIDdriver'];//$y is any declared variable
echo $driverschoolIDpullorderdatainstance; //for debugging


$query = "SELECT driv.first_name, driv.last_name, sch.schoolname, ordspec.order_id, ordspec.date, ordspec.time, ordspec.price, ordspec.order_date, cus.customerID, cus.first_name, cus.last_name FROM orderlist ordspec
JOIN drivers driv /*alias of cus for customer*/
    on ordspec.school_id = driv.schoolID
JOIN schools sch /*alias of cus for customer*/
    on ordspec.school_id = sch.schoolID
JOIN customers cus /*alias of cus for customer*/
    on ordspec.customer_id = cus.customerID
WHERE ordspec.school_id = '" . $driverschoolIDpullorderdatainstance."'
";
$query3 = "SELECT first_name, last_name FROM drivers
WHERE schoolID= '" . $driverschoolIDpullorderdatainstance."'";


//search database
//check if the variable has not been initalized
$result = mysqli_query($connection, $query);
$result2 = mysqli_query($connection, $query);
$result3 = mysqli_query($connection, $query3);

if (empty($result)){
    exit("databasePhp query failed, the result does not exist."+$SESSION_['schoolIDdriver']);
}

// Close the connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/shop-homepage.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="../index.php">Dinners Direct</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="../index.php" collapse="navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="pulldriverschedule.php">My Account</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="logOut.php">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Page Content -->
<div class="container">
    <h1> Driver information</h1>

    <table class="table" >
        <tr>
            <th>Name</th>
        </tr>
        <tr>
            <td><?php
            $names=($result2->fetch_assoc()); //instance var to just get the first and last name
                $names3=($result3->fetch_assoc());
                echo $names3['first_name']. " ".$names3['last_name'] ?></td>
        </tr>
        <tr>
            <th>School name</th>
            <th>Order ID</th>
            <th>Customer Name</th>
            <th>Date ordered</th>
            <th>Delivery date</th>
            <th>Delivery time</th>
            <th>Amount paid</th>
        </tr>
        <?php  while( $user=mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php print_r($user['schoolname']) ?> </td>
            <td><?php echo $user['order_id'] ?></td>
            <td><?php echo $user['first_name']." ".$user['last_name'] ?></td>
            <td><?php echo $user['order_date'] ?></td>
            <td><?php echo $user['date'] ?></td>
            <td><?php echo $user['time'] ?></td>
            <td><?php echo $user['price'] ?></td>
        </tr>

<? }?>
    </table>
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


