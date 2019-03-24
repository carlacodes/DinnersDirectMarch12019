<?php

if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}
require_once("dbConnect.php");
$db_handle = new DBConnect();
$conn = $db_handle -> connectDB();

if($_SERVER['REQUEST_METHOD']=$_POST){
    $delivery = $_POST['dt'];
    $delivery_time = $_POST['time'];
}
?>

<?php

if(isset($_SESSION["cart_item"])){


    $schoolID=$_SESSION['schoolID'];

    $customerID=$_SESSION['userID'];

    $driver_id=$_SESSION['driverID'];

    $item_date = $delivery;

    $item_time = $delivery_time;

    $total_price = "";



    foreach ($_SESSION["cart_item"] as $item => $value ){
        $item_price = (double)$_SESSION["cart_item"][$item]['price'];
        $item_quantity = (double)$_SESSION["cart_item"][$item]['quantity'];

        $sub_price = (double)$item_price * (double)$item_quantity;
        $total_price += (double)$sub_price;

    }


    $query = "INSERT INTO orderlist (customer_id, school_id, date, time, price, driver_id) VALUES ('$customerID', '$schoolID', '$item_date', '$item_time', '$total_price', ' $driver_id')";
    mysqli_query($conn, $query);
    $order_id = mysqli_insert_id($conn);


    foreach ($_SESSION["cart_item"] as $item => $value ){

        $item_id = $_SESSION["cart_item"][$item]['ID'];

        $item_quantity = $_SESSION["cart_item"][$item]['quantity'];

        $item_price = $_SESSION["cart_item"][$item]['price'];

        $item_code = $_SESSION["cart_item"][$item]['code'];

        $query = "INSERT INTO orderitem (order_id, item_id, quantity) " .
            "VALUES ('$order_id', '$item_id', '$item_quantity')";

        mysqli_query($conn, $query);

        //$value is the array that has the information
        //under foreach loop we can access the array one by one
        //array_walk_recursive($value,"myfunction"); //this one helps us visualise the array to debug

    }

    echo '<script type="text/javascript"> alert("Payment successful!");  location="phpdata/pullorderdata.php";</script>';
    unset($_SESSION["cart_item"]);
}