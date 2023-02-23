<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biblioteca";

  
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $conn->set_charset('utf8');
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }