<?php
$host = 'localhost';
    $dbusername = 'kevin';
    $dbpassword = '35852744';
    $dbname = 'BMW';

    $connection = new mysqli($host, $dbusername, $dbpassword, $dbname);
    if($connection -> connect_error){
        echo 'Database connection failed. '. $connection ->connect_error;
    }
?>