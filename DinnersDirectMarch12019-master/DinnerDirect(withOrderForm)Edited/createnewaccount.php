<?php

$CreateAccount = "active";
include 'header_layout.php';

?>

  <head>

    <title>Create New Account</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

  </head>

  </body>


  <!-- Page Content -->
    <div class="container">
      <h1> Create a New Account</h1>
      <form method="post" action="phpdata/createnewuser.php">
        Your Email:<br>
        <input type="email" name="email" required><br>
        Your password:<br>
        <input type="password" name="password" required><br>

        Your First Name:<br>
        <input type="first_name" name="first_name" required><br>

        Your Last Name:<br>
        <input type="last_name" name="last_name" required><br>

        Your School:<br>
        <select type="schoolID" name="schoolID" required><br>>
          <option value="1">UCL</option>
          <option value="2">Imperial</option>
          <option value="3">King's College London</option>
          <option value="4">Oxbridge</option>
        </select>

        <br><br>
        <input type="submit" class="btn btn-primary" value="Submit" required>
      </form>
      <div class="row">

            </div>

    </div>

  <?php

  include 'footer_layout.php';

  ?>

</html>
