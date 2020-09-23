<?php

    session_start();

     
if (array_key_exists("logout", $_GET)) {
        
        unset($_SESSION);
        setcookie("company_id", "", time() - 60*60);
        $_COOKIE["company_id"] = "";  
        
    } else if ((array_key_exists("company_id", $_SESSION) AND $_SESSION['company_id']) OR (array_key_exists("company_id", $_COOKIE) AND $_COOKIE['company_id'])) 
    {
        
        header("Location: loggedinthepage.php");
        
    }
 $error = "";  

    if (array_key_exists("submit", $_POST)){

     
     include("connection.php");
        
        
         
        if ($_POST['password']!= $_POST['cpassword']) {
            
            echo "Passwords doesn't match";
            
        } 
        
         else  
        {
            
                $query = "SELECT company_id FROM `registration` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";

                $result = mysqli_query($link, $query);

                if (mysqli_num_rows($result) > 0) {

                    $error = "That email address is taken.";

                } else {

                    $query = "INSERT INTO `registration` (`email`, `password`,`cpassword`,`website`, `address`,`company_name`, `point_of_contact`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."',
                    '".mysqli_real_escape_string($link, $_POST['password'])."',
                    '".mysqli_real_escape_string($link, $_POST['cpassword'])."',
                    '".mysqli_real_escape_string($link, $_POST['website'])."',
                    '".mysqli_real_escape_string($link, $_POST['address'])."',
                    '".mysqli_real_escape_string($link, $_POST['company'])."',
                    '".mysqli_real_escape_string($link, $_POST['employee'])."')";

                    if (!mysqli_query($link, $query)) {

                        $error = "<p>Could not sign you up - please try again later.</p>";

                    } else {
                          $query = "UPDATE `registration` SET password = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE company_id = ".mysqli_insert_id($link)." LIMIT 1";
                        $query1 = "UPDATE `registration` SET cpassword = '".md5(md5(mysqli_insert_id($link)).$_POST['cpassword'])."' WHERE company_id = ".mysqli_insert_id($link)." LIMIT 1";

                        mysqli_query($link, $query);
                         mysqli_query($link, $query1);

                        $_SESSION['company_id'] = mysqli_insert_id($link);

                        header("Location:loggedinthepage.php");


                    }

                } 
                
            }
    }
    
        
?>
<div id="error"><?php echo $error; ?></div>

<?php include("headersignup.php"); ?>
