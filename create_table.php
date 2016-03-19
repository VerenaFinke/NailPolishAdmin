<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = ""; 
    $db_name = "nailPolishAdmin";
    
    $connection = new mysqli($servername, $username, $password, $db_name);
    
    
    if ($connection->connect_error) {
        die ("Connection failed: " . $connection->connect_error);
    }
    
    $tablenp = "CREATE TABLE IF NOT EXISTS nailPolish (
        id INTEGER NOT NULL AUTO_INCREMENT ,
        name VARCHAR(255) NOT NULL,
        brand_id INTEGER(100) NOT NULL,
        limitedEdition_id INTEGER(100),
        PRIMARY KEY (id) 
    )";
        
    $tableb = "CREATE TABLE IF NOT EXISTS brand (
        id INTEGER NOT NULL AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        PRIMARY KEY (id) 
    )" ;
        
    $tablele = "CREATE TABLE IF NOT EXISTS limitedEdition (
        id INTEGER NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        brand_id INTEGER(100) NOT NULL,
        PRIMARY KEY (id) 
    )" ;
    
    if ($connection->query($tablenp) === TRUE) {
        echo "Table nailPolish created successfully<br>";
    } else {
        echo "Error creating table: " . $connection->error;
    }
    
    if ($connection->query($tableb) === TRUE) {
        echo "Table brand created successfully<br>";
    } else {
        echo "Error creating table: " . $connection->error;
    }
    
    if ($connection->query($tablele) === TRUE) {
        echo "Table limitedEdition created successfully<br>";
    } else {
        echo "Error creating table: " . $connection->error;
    }
        
    $connection->close();                  