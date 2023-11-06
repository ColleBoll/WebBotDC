<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["dbname"]) && isset($_POST["dbhost"]) && isset($_POST["dbusername"]) && isset($_POST["dbuserpassword"])) {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $admin = 0;
            $dbName = $_POST["dbname"];
            $dbHost = $_POST["dbhost"];
            $dbUsername = $_POST["dbusername"];
            $dbUserPassword = $_POST["dbuserpassword"];

            //database verbinding
            $dsn = "mysql:host=" . $dbHost . ";dbname=" . $dbName;

            try {
                $pdo = new PDO($dsn, $dbUsername, $dbUserPassword);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "hoi 2";
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            //----------------
        
            try {
        
                $query = "INSERT INTO users (username, email, password, admin) VALUES (?, ?, ?, ?);";
    
                $stmt = $pdo->prepare($query);
    
                $stmt->execute([$username, $email, $password, $admin]);
    
                $stmt = null;

                $_SESSION['succes_message'] = "Data input account succes!";
                
            } catch (PDOException $e) {
                $_SESSION['error_message'] = "ERROR: " . $e->getMessage();
                echo($e);
                exit;
            }
            try {
                $json_object = file_get_contents('../config.json');
    
                $data = json_decode($json_object, true);
                print($data);
                $data[0]['dbname'] = $dbName;
                $data[0]['dbhost'] = $dbHost;
                $data[0]['dbusername'] = $dbUsername;
                $data[0]['dbuserpassword'] = $dbUserPassword;
                $data[0]['setup'] = true;
                $json_object = json_encode($data, JSON_PRETTY_PRINT);
                file_put_contents('../config.json', $json_object);

            } catch (PDOException $e) {
                echo("ERROR: " . $e);
            }
        } else {
            echo "Some data is missing.";
        }
    }

?>