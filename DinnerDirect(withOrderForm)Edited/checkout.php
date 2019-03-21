<?php
session_start();
require_once("phpdata/databasephp.php");
//$db_handle = new DBConnect();
//$userIDpullorderdatainstance=$_SESSION['userID'];
echo $_SESSION['userID'];
if (empty($_SESSION['userID'])){
    echo '<script type="text/javascript"> alert("Please Log In Before Placing an Order");
    location="index.php";
</script>';
}
include 'header_layout.php';
?>


<head>
    <!-- Custom styles for this template -->
    <link href="css/menu2.css" rel="stylesheet" />

</head>
<body>

<div class="container">


    <!-- Side Bar -->
    <div class="row">
        <div class="col-lg-3">
        </div>
        <!-- /.Side Bar -->

        <!-- Menu -->
        <div class="col-lg-9">
            <br><br>
            <br><br>

            <!-- Shopping Cart -->
            <?php
            $_SESSION["checkout"] = 0;
            $_SESSION["additem"] = 0;
            include 'cart.php';
            ?>
            <!-- /.Shopping Cart -->


                <!--delivery time -->
                <div>
                    <?php
                    include  'deliverydate.php'; ?>
                </div>
                <!--/.delivery time-->


        </div>
        <!-- /.col-lg-9 -->
    </div>
    <!-- row -->
</div>
<!-- /.container -->


</body>


</html>