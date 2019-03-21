<?php
session_start();
$login = 'active';
 include 'header_layout.php';
?>

<body>


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
    <p>Do not have an account?</p>
    <a href="createnewaccount.php" class="btnCreateNewAccount">Create New Account</a>
    
    <p>Driver Login?</p>
    <a href="driverlogin.php" class="btnDriverLogin">Driver Login</a>

' ?>

    <?php } ?>

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; DinnersDirect 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
