<?php

    session_start();

    $error = "";    

    if (array_key_exists("logout", $_GET)) {
        
        unset($_SESSION);
        setcookie("company_id", "", time() - 60*60);
        $_COOKIE["company_id"] = "";  
        
    } else if ((array_key_exists("company_id", $_SESSION) AND $_SESSION['company_id']) OR (array_key_exists("company_id", $_COOKIE) AND $_COOKIE['company_id']))
    {
        
        header("Location: loggedinthepage.php");
        
    }

    if (array_key_exists("submit", $_POST))
    {
        
       include("connection.php");
        
        
        {
            $query = "SELECT * FROM `registration` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
                
                    $result = mysqli_query($link, $query);
                
                    $row = mysqli_fetch_array($result);
            
            
                    $_SESSION['email']=$row['email'];
                    if (isset($row)) {
                        
                        $hashedPassword = md5(md5($row['company_id']).$_POST['password']);
                        
                        if ($hashedPassword == $row['password']) {
                            
                            $_SESSION['company_id'] = $row['company_id'];
                            

                            header("Location: loggedinthepage.php");
                                
                        } else {
                            
                            $error= "That email/password combination could not be found.";
                            
                        }
                        
                    } else {
                        
                        $error= "That email/password combination could not be found.";
                        
                    }
        }
        
    }
?>
<?php include("headerlogin.php"); ?>

  