<?php
if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}
$login = 'active';
 include 'header_layout.php';
?>

<head>
    <title>Login</title>
</head>

</body>


<!-- Page Content -->
<div class="container">

    <?php


    if(empty($_SESSION["userID"]))
    {?>
        <?= '<h1> login to your account </h1>


            <form method="post" action="phpdata/logincheck.php" >
                <fieldset >
                    <legend>Customer Log In</legend>
                    Your Email:<br>
                    <input type="email" name="email" required><br>
                    Your password:<br>
                    <input type="password" name="password" required><br>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Submit" required>
                </fieldset>
            </form>
            
                <br>
    <p>Do not have an account? <br>
    <a href="createnewaccount.php" class="btnCreateNewAccount">Create New Account</a></p>
    
    <p>Driver Login? <br>
    <a href="driverlogin.php" class="btnDriverLogin">Driver Login</a></p>

' ?>

    <?php } ?>

</div>
<!-- /.container -->

<?php include 'footer_layout.php' ?>

</html>
