<?php

include ("connection.php");
session_start();
 if (array_key_exists("company_id", $_COOKIE)) {
        
        $_SESSION['company_id'] = $_COOKIE['company_id'];
        
    }

    if (!array_key_exists("company_id", $_SESSION)) 
    {
    
        header("Location: Login.php");
        
    }

include ("headermycamp.php");
?>