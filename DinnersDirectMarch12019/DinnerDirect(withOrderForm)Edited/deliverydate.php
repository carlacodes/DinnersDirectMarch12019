<!DOCTYPE html>
<html>
<head>
    <title>jQuery Datepicker</title>
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <script src="js/jquery-1.12.4.js"></script>
    <script src="js/jquery-ui.js"></script>
</head>
<body>
Choose Date: <input type="text" name="dt" id="select_date">
<script type="text/javascript">
    $(function () {
        $("#select_date").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true,
            showOtherMonths: true,
            selectOtherMonths: false,
            changeMonth: false,
            changeYear: false,
            minDate: new Date()

        });

    });
</script>
</body>
</html>