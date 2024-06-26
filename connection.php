<?php
    //ini_set('display_errors', 0);
    function checkConnectionDb(){
        try {
            $db_host = 'localhost:3305';
            $db_user = 'root';
            $db_password = '';
            $db_db = 'Furever';
            
            $con = @new mysqli(
                $db_host,
                $db_user,
                $db_password,
                $db_db
            );
            if ($con->connect_error) {
                throw new Exception("Database connection failed: " . $con->connect_error);
            }    
        } catch (Exception $e) {
            // log error to file with timestamp
            $error = date_default_timezone_set('America/Toronto') . " - " . date('m/d/Y h:i:s a', time()) . " - " . "Error: " . $con->error;
            error_log($error . "\n", 3, "error.log");
            // redirect user to error page
            header("Location: index.php");
            exit;
        } 
        return $con;
    }