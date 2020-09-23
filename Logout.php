<?php
session_start();
if(isset($_SESSION['company_id']))
{
session_destroy();
    unset($_SESSION['company_id']);
    unset($_SESSION['email']);
header('location: Login.php');
}
?>