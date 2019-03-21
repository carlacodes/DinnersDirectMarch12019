<?php

$driverlogin = "active";
include 'header_layout.php';

?>

<head>

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

  </head>




  <!-- Page Content -->
    <div class="container">
      <h1> Login to driver's account </h1>
      <form method="post" action="phpdata/driverlogincheck.php">
        Your Email:<br>
        <input type="email" name="email" required><br>
        Your password:<br>
        <input type="password" name="password" required><br>
        <br>
        <input type="submit" class="btn btn-primary" value="Submit" required>
      </form>
      <br>



          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->


  <?php
  include 'footer_layout.php';
  ?>

</html>
