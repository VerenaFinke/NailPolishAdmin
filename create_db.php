<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = ""; 
    
    $connection = new mysqli($servername, $username, $password);
    if ($connection->connect_error) {
        die ("Connection failed: " . $connection->connect_error);
    }
    
    $sql = "CREATE DATABASE nailPolishAdmin";
    if ($connection->query($sql) === TRUE) {
        echo "Database created successfully";
    }
    else {
        "Error creating database: " . $connection->error;
    }
?> 