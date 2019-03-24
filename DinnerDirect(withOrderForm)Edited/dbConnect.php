<?php
//reference codes from https://phppot.com/php/simple-php-shopping-cart/

class DBConnect {
    private $host = "localhost";
    private $user = "dinnersuser";
    private $password = "dinnersdirectE";
    private $database = "dinnersdirect";
    private $connection;

    function __construct() {
        $this->connection = $this->connectDB();
    }

    function connectDB() {
        $connection = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        return $connection;
    }

    function runQuery($query) {
        $result = mysqli_query($this->connection,$query);
        while($row=mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if(!empty($resultset))
            return $resultset;
    }

    function numRows($query) {
        $result  = mysqli_query($this->connection,$query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
}
?>