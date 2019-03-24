<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="../index.php">Dinners Direct</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="../index.php" collapse="navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item
                <?php if(isset($home_active)){
                    echo $home_active;
                    }
                    else {
                    echo " ";
                    }
                ?>">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>


                <li class="nav-item
                <?php if(isset($about)){
                    echo $about;
                    }
                    else {
                    echo " ";
                    }
                ?>">
                    <a class="nav-link" href="../about.php">About</a>
                </li>


                <li class="nav-item
                <?php if(isset($MyAccount)){
                    echo $MyAccount;
                    }
                    else {
                    echo " ";
                    }
                ?>">
                    <a class="nav-link" href="pullorderdata.php">My Account</a>
                </li>


                <li class="nav-item
                <?php if(isset($Order)){
                    echo $Order;
                    }
                    else {
                    echo " ";
                    }
                ?>">
                    <a class="nav-link" href="../menu.php">Order</a>
                </li>


                <li class="nav-item
                <?php if(isset($Cart)){
                    echo $Cart;
                    }
                    else {
                    echo " ";
                    }
                ?>">
                    <a class="nav-link" href="../shopping_cart.php">Cart</a>
                </li>


                <?='<li class="nav-item'?>
                <?php
                if(!empty($_SESSION["userID"]) || !empty($_SESSION['schoolIDdriver']))
                {

                    if(isset($logOut)){
                        echo $logOut;
                        }
                        else {
                        echo " ";
                        } ?>
                        <?= '"> 
                        <a class="nav-link" href="logOut.php">Logout</a>'?>


                <?php
                }
                else {
                    if(isset($login)){
                        echo $login;
                        }
                        else {
                        echo " ";
                        } ?>
                        <?= '"> 
                        <a class="nav-link" href="../login.php">Login</a>'?>

                <?php
                }

                ?>

                 <?='<li>'?>

            </ul>
        </div>
    </div>
</nav>
</body>