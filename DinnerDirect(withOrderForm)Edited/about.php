<?php
session_start();

$about = "active";
include 'header_layout.php';

?>

<head>
  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- Icon style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>About</title>

</head>

<body>
<!-- Page Content -->


<!-- Additional Information on Webpage -->
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h2 class="mt-4">What We Offer</h2>
            <p>We offer food catering service specially for students.</p>
            <p>This is a group project by <b>Carla Griffiths, Louis Nguyen, Hui En Saw, Azza and Subhana</b>.</p>
            <p>
                <a class="btn btn-primary btn-lg" href="menu.php">Order Now!</a>
            </p>
        </div>
        <div class="col-sm-4">
            <h2 class="mt-4">Contact Us</h2>
            <address>
                <strong>DinnersDirect</strong>
                <br>Gower St, Bloomsbury,
                <br>London WC1E 6BT
                <br>
            </address>
            <address>
                <abbr title="Phone">P:</abbr>
                (44) 1234567890
                <br>
                <abbr title="Email">E:</abbr>
                <a href="mailto:#">name@example.com</a>
            </address>
        </div>
    </div>
</div>


<?php
include 'footer_layout.php';
?>

</html>
