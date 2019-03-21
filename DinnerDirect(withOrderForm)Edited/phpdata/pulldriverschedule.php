<?php
if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}

$MyAccount = 'active';
include 'header_layout2.php';
require_once('databasephp.php');
$connection = connectToDb();
session_start();

//$srch_term = $_GET['srch-term'] ?? '1'; //PHP 7.0
//$srch= $_GET['srch-term'] ?? '1'; //dataphp 7.0
//echo "$srch";

$driverschoolIDpullorderdatainstance=$_SESSION['schoolIDdriver'];//$y is any declared variable
echo $driverschoolIDpullorderdatainstance; //for debugging


$query = "SELECT driv.first_name, driv.last_name, sch.schoolname, ordspec.order_id, ordspec.date, ordspec.time, ordspec.price, ordspec.order_date FROM orderlist ordspec
JOIN drivers driv /*alias of cus for customer*/
    on ordspec.school_id = driv.schoolID
JOIN schools sch /*alias of cus for customer*/
    on ordspec.school_id = sch.schoolID
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


<head>

    <!-- Custom styles for this template -->
    <link href="../css/shop-homepage.css" rel="stylesheet">

</head>

<body>


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
            <th>Date ordered</th>
            <th>Delivery date</th>
            <th>Delivery time</th>
            <th>Amount paid</th>
        </tr>
        <?php  while( $user=mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php print_r($user['schoolname']) ?> </td>
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


