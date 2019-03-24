<?php
if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}

require_once("dbConnect.php");
$db_handle = new DBConnect();

//reference codes from https://phppot.com/php/simple-php-shopping-cart/

if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
            if(!empty($_POST["quantity"])) {
                $orderItem = $db_handle->runQuery("SELECT * FROM mealdeal WHERE code='" . $_GET["code"] . "'");
                $orderItemArray = array($orderItem[0]["code"]=>array('name'=>$orderItem[0]["name"], 'ID'=>$orderItem[0]["ID"], 'code'=>$orderItem[0]["code"], 'description'=>$orderItem[0]["description"], 'quantity'=>$_POST["quantity"], 'price'=>$orderItem[0]["price"], 'image'=>$orderItem[0]["image"]));

                if(!empty($_SESSION["cart_item"])) {
                    if(in_array($orderItem[0]["code"],array_keys($_SESSION["cart_item"]))) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                            if($orderItem[0]["code"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$orderItemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $orderItemArray;
                }
            }

            break;

        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}
?>