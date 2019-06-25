<?php
//Connect to database

    //Set variables
    $servername = "localhost";
    $dbName = "fancy_clothes";
    $username = "root";
    $password = "";

    try{
        $dbh = new PDO("mysql:host=$servername;dbname=$dbName; charset=utf8", $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
        //Connection failed
    }

?>