<?php

//making this a function
//session_destroy();
require_once('databasephp.php');
if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}


$_SESSION['logged'] = 1;
$emailSql=$_POST['email']; //want to retrieve email
$passwordSQL=$_POST['password'];


$qryFind = "Select c.*, d.driverID from drivers d, customers c where c.schoolID = d.schoolID";
$qryFind .= " AND c.password = '" . $passwordSQL ."' AND c.email = '" . $emailSql . "'";



$connection = connectToDb();

//Check if the name exists
$result = mysqli_query($connection, $qryFind);
if (empty($result)){
    echo "The result is empty";
}
if (mysqli_num_rows($result) > 0) {

    echo '<script type="text/javascript"> alert("You are logged in!"); location="../index.php";</script>';
    $user = mysqli_fetch_assoc($result);

    $_SESSION['logged'] = 1;
    $userID=$user['customerID'];
    $_SESSION['userFirstName'] =$user['first_name'];
    $_SESSION['schoolID']=$user['schoolID'];
    $_SESSION['driverID']=$user['driverID'];


    echo '<script type="text/javascript"> alert("<?php echo $userID; ?>"); location="../index.php"; </script>';
    $_SESSION['userID']=$userID;
    //test to make sure customer id in sql database corresponds
    //header('Location: http://localhost/DinnersDirecHuiEn/startbootstrap-shop-homepage-gh-pages/index.php');
} else {
    echo '<script type="text/javascript"> alert("Cannot find the selected user. Please try again or create a new account.");location="../index.php"; </script>';
        closeDb($connection);
}



?>
