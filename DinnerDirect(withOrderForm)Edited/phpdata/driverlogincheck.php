<?php

//making this a function
session_destroy();
require_once('databasephp.php');
if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}


$emailSql=$_POST['email']; //want to retrieve email
$passwordSQL=$_POST['password'];


$qryFind = "SELECT * FROM drivers ";
$qryFind .= " WHERE password = '" . $passwordSQL ."' AND email = '" . $emailSql . "'";

$connection = connectToDb();


//Check if the name exists
$result = mysqli_query($connection, $qryFind);
if (empty($result)){
    echo "The result is empty";
}
if (mysqli_num_rows($result) > 0) {

    echo '<script type="text/javascript"> alert("You are logged in!"); location="pulldriverschedule.php"; </script>';
    $user = mysqli_fetch_assoc($result);
    $driverID=$user['driverID'];
    $_SESSION['driverID']=$driverID;
    $_SESSION['schoolIDdriver']=$user['schoolID'];
    require("pulldriverschedule.php");
    //test to make sure customer id in sql database corresponds
    //header('Location: http://localhost/DinnersDirecHuiEn/startbootstrap-shop-homepage-gh-pages/index.php')
} else {
    echo '<script type="text/javascript"> alert("Cannot find the selected user. Please try again or create a new account.!"); location="../index.php"; </script>';
        echo "$emailSql, $passwordSQL";
        closeDb($connection);
}

