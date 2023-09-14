<?php

    $json_object = file_get_contents('../config.json'); 
    $jsonObj = json_decode($json_object, true);
    $keyDbName = "dbname";
    $keyDbHost = "dbhost";
    $keyDbUsername = "dbusername";
    $keyDbUserPassword = "dbuserpassword";
    $dbName = $jsonObj[0][$keyDbName];
    $dbHost = $jsonObj[0][$keyDbHost];
    $dbUsername = $jsonObj[0][$keyDbUsername];
    $dbUserPassword = $jsonObj[0][$keyDbUserPassword];

    $dsn = "mysql:host=" . $dbHost . ";dbname=" . $dbName;

    try {
        $pdo = new PDO($dsn, $dbUsername, $dbUserPassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>