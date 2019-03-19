<!DOCTYPE html>
<html>
<head>
    <title>jQuery Datepicker</title>
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <script src="js/jquery-1.12.4.js"></script>
    <script src="js/jquery-ui.js"></script>
</head>
<body>
<form method="post" action=payment.php >

Choose Date: <input type="text" name="dt" id="select_date" >
<script type="text/javascript">
    $(function () {
        $("#select_date").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true,
            showOtherMonths: true,
            selectOtherMonths: false,
            changeMonth: true,
            changeYear: false,
            minDate: new Date(),
            maxDate: 14


        });

    });
</script>


    <button type="submit" href="payment.php" id="myBtn" class="btnCheckout" style=" background-color: #ffffff;
                                border: #21d000 1px solid;
                                padding: 5px 10px;
                                color: #21d000;
                                float: right;
                                text-decoration: none;
                                border-radius: 3px;
                                margin: 10px 0px;">Make Payment</button>


</form>
</body>
</html>