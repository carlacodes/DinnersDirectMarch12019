<!DOCTYPE html>
<html>
<head>
    <title>jQuery Datepicker</title>
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link href="css/menu2.css" rel="stylesheet">
    <script src="js/jquery-1.12.4.js"></script>
    <script src="js/jquery-ui.js"></script>
</head>
<body>
<br><br><br>
<form method="post" action=payment.php>

Choose Date: <input type="text" name="dt" id="select_date" class="date readonly" required/>

<script type="text/javascript">

    $(".readonly").keydown(function(e){
        e.preventDefault();
    });

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


    <br><br>
    Choose Time:
    <br><input type="radio" name="time" value="0700" checked>Morning: 0700
    <br><input type="radio" name="time" value="1200">Afternoon: 1200
    <br><input type="radio" name="time" value="1700">Evening: 1700






<!---->
<!--    <input type="radio" name="time"-->
<!--        --><?php //if (isset($gender) && $gender=="female") echo "checked";?>
<!--           value="female">Female-->
<!--    <input type="radio" name="time"-->
<!--        --><?php //if (isset($gender) && $gender=="male") echo "checked";?>
<!--           value="male">Male-->
<!--    <input type="radio" name="gender"-->
<!--        --><?php //if (isset($gender) && $gender=="other") echo "checked";?>
<!--           value="other">Other-->

    <button type="submit" href="payment.php" name="Pay" id="btnCart">Make Payment</button>


</form>
</body>
</html>