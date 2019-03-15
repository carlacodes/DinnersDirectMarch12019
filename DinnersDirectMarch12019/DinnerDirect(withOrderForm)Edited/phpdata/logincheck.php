<?php

//making this a function
//session_destroy();
require_once('databasephp.php');
session_start();

//ALTER THE TABLE DEFAULT VALUES FOR ALL THE REQUIRED COLUMNS 05/02/2019
mysqli_query($link,"ALTER TABLE customers
/*ALTER COLUMN store_id SET DEFAULT NULL,
ALTER COLUMN address_id SET DEFAULT NULL,
ALTER COLUMN active SET DEFAULT '1',
ALTER COLUMN create_date SET DEFAULT CURRENT_TIMESTAMP*/
))");

//$firstName = $_POST['first_name'] ?? '1'; //dataphp 7.0
//$familyName = $_POST['last_name'] ?? '1';
$_SESSION['logged'] = 1;
$emailSql=$_POST['email']; //want to retrieve email
$passwordSQL=$_POST['password'];
/*$qryAdd = "INSERT INTO customer (first_name, last_name, email) VALUES (";
$qryAdd .= "'" . $firstName . "', '" . $familyName . "', '" . $emailSql . "')";*/

//$qryFind = "SELECT * FROM customers";
$qryFind = "Select c.*, d.driverID from drivers d, customers c where c.schoolID = d.schoolID";
$qryFind .= " AND c.password = '" . $passwordSQL ."' AND c.email = '" . $emailSql . "'";



$connection = connectToDb();
//do something there to force unset all the data, on SLIDE Refer to the PHP manual and use:

//Check if the name exists
$result = mysqli_query($connection, $qryFind);
if (empty($result)){
    echo "The result is empty";
}
if (mysqli_num_rows($result) > 0) {

    echo '<script type="text/javascript"> alert("You are logged in!"); location="../index.html";</script>';
    $user = mysqli_fetch_assoc($result);

    $_SESSION['logged'] = 1;
    //echo "Welcome";
    //echo $user['first_name'];
    //echo $user['last_name'];
    $userID=$user['customerID'];
    $_SESSION['userFirstName'] =$user['first_name'];
    $_SESSION['schoolID']=$user['schoolID'];
//    $qryFind2 = "SELECT driverID FROM drivers WHERE schoolID ='" . $user['schoolID'] ."')";
//    $result2 = mysqli_query($connection, $qryFind);
//    $user2 = mysqli_fetch_assoc($result);
    $_SESSION['driverID']=$user['driverID'];



//    $_SESSION['driverID']=$user['driverID'];

    echo '<script type="text/javascript"> alert("<?php echo $userID; ?>"); location="../index.html"; </script>';
    $_SESSION['userID']=$userID;
    //echo $userID; //test to make sure customer id in sql database corresponds
    //header('Location: http://localhost/DinnersDirecHuiEn/startbootstrap-shop-homepage-gh-pages/index.html');
    //exit;
} else {
    echo '<script type="text/javascript"> alert("Cannot find the selected user. Please try again or create a new account.");location="../index.html"; </script>';
        //echo "Cannot find the selected user. Please try again or create a new account.";
        //echo "$emailSql, $passwordSQL";
        closeDb($connection);
}



?>
