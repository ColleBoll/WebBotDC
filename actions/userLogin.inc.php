<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
        $password = $_POST["password"];

        try {
            require_once "../assets/db.inc.php";

            $query = "SELECT * FROM users WHERE username=?;";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$username]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if($result){
                $resultUsername = $result['username'];
                $resultAdmin = $result['admin'];
                $resultEmail = $result['email'];
                if($result['password'] == $password){
                    $_SESSION['username'] = $resultUsername;
                    $_SESSION['email'] = $resultEmail;
                    $_SESSION['admin'] = $resultAdmin;

                    // header("Location: ../");
                }else{
                    $_SESSION['error_message'] = "password not correct";
                    header("Location ../");
                }
            }else{
                $_SESSION['error_message'] = "username not found!";
                // header("Location: ../");
            }
            $stmt = null;
        } catch (PDOException $e) {
            $_SESSION['error_message'] = "ERROR: " . $e;
            echo("ERROR: " . $e);
        }
        
    }

?>