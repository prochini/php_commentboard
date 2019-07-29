<?php
    $servername = 'localhost';
    $username ='root';
    $password = '748Mmanson!';
    $dbname = 'commentboard';
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->query("SET NAMES UTF8");
    $conn->query("SET time_zone = '+8:00'");
        if($conn->connect_error){
        die("connection failed" . $conn->connect_error);
    }
?>
