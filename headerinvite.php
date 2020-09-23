<?php
 error_reporting(0);
 
include ("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Red+Rose&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="form_2.css">
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Red+Rose&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Gayathri&display=swap" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/st.css">
    
	
</head>
<body>
     <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="loggedinthepage.php" target="blank">
            <img src="images/logo.png" width="40" height="30" class="d-inline-block align-top" alt="">
            <h3>Catchers <?php echo $_SESSION['email'];?></h3>
          </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="loggedinthepage.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="startcampaign.php">Start Campaign</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="mycampaign.php">My Campaign</a>
            </li>
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Stats
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="statistics.php">Pie-Chart</a>
                <a class="dropdown-item" href="statistics.php">Candle</a>
                <a class="dropdown-item" href="statistics.php">Graphs</a>
              </div>
            </li>
           <li class="nav-item active">
                <a href ='Logout.php'>
        <button class="btn btn-success-outline" type="submit" >Logout</button></a>
              </li>
          </ul>
        </div>
      </nav>
    <div class="container">
        <h2>Mail Information</h2>
        <form class="form-horizontal" action="" method="post" name="uploadCSV"
    enctype="multipart/form-data">
            <fieldset>
                <label class="col-md-4 control-label">Choose CSV File</label> <input
            type="file" name="file" id="file" accept=".csv">
        <button type="submit" id="submit" name="import1"
            class="btn-submit">Import</button>
        <br />

    <div id="labelError"></div>
			</fieldset>
		</form>
		<?php

if (isset($_POST["import1"])) {
    //echo"1";
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        $q="truncate invite";
		$r=mysqli_query($db,$q);
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sqlInsert = "INSERT into invite (username,email)
                   values ('" . $column[0] . "','" . $column[1] . "')";
            $result = mysqli_query($db, $sqlInsert);
            
            if (! empty($result)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}
?>
<?php
if (isset($_POST["import1"]))
{
$sqlSelect = "SELECT distinct * FROM invite";
$result = mysqli_query($db, $sqlSelect);
            
if (mysqli_num_rows($result) > 0) {
?>
<table id='userTable' border=2>
    <thead>
        <tr>
            <th>User Name</th>
            <th>Email Id</th>
        </tr>
    </thead>
    <?php
	while ($row = mysqli_fetch_array($result)) {
    ?>

    <tbody>
        <tr>
            <td><?php  echo $row['username']; ?></td>
            <td><?php  echo $row['email']; ?></td>
        </tr>
     <?php
     }
     ?>
    </tbody>
</table>
<?php }} ?>
<div>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
	Users Selected for Invite<br>
	<input type="submit" name="submit" value="Invite">
</form>
</div>
<br>
<form action="invite2.php" method="post">
<fieldset>
<?php
if(array_key_exists('submit', $_POST)) { 
sendmail(); 
} 
function sendmail()
{
	?>
	<div>
		<h3>Please Enter Below the Details to send mail.</h3>
	</div>
	<div>
		   <div class="form-group">
			  <label for="formGroupExampleInput">SMTP Server Name:</label>
			  <input type="text" class="form-control" id="formGroupExampleInput" name="server" placeholder="smtp1.example.com" required>
			</div>
			<div class="form-group">
			  <label for="formGroupExampleInput2">SMTP User Name:</label>
			  <input type="email" class="form-control" id="formGroupExampleInput2" name="username" placeholder="user@example.com" required>
			</div>
			<div class="form-group">
				<label for="formGroupExampleInput2">SMTP Password:</label>
				<input type="password" class="form-control" id="formGroupExampleInput2" name="password" placeholder="Encrpted" required>
			</div>
			<div class="mb-3 form-group">
				<label for="validationTextarea">Mail Body</label>
				<textarea class="form-control " id="validationTextarea" name="mailbody" placeholder="Required mail body textarea" required></textarea>
			</div>
			<div class="form-check form-group">
				<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
				<label class="form-check-label" for="invalidCheck">
				  Agree to terms and conditions
				</label>
				<div class="invalid-feedback">
				  You must agree before submitting.
				</div>
			</div>
			<br>
			<input type='submit' name='saveconfig' value='Send Mail'/>
	</div>
	<?php
}
?>
	</fieldset>
        </form>
    </div>
 <footer class="footer-distributed">

			<div class="footer-left">
         
				<h3>About<span>SKynet</span></h3>

				<p class="footer-links">
					<a href="loggedinthepage.php">Home</a>
					|
					<a href="startcampaign.php">campaign</a>
					|
					<a href="Aboutus.html">About us</a>
					|
					<a href="login.html">login</a>
				</p>

				<p class="footer-company-name">© skynetsecure Solutions Pvt. Ltd.</p>
			</div>

			<div class="footer-center">
				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>309,JALPA DIVINE 
						 Bldg. No. A - 1,Sector - 1</span>
						Mahape,  MUMBAI - 400092</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>+91 22-27782183</p>
				</div>
				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:info@skynetsecure@eduonix.com">info@skynetsecure.com</a></p>
				</div>
			</div>
			<div class="footer-right">
				<p class="footer-company-about">
					<span>About the company</span>
					We offer training and skill building courses across Technology, Design, Management, Science and Humanities.</p>
				<div class="footer-icons">
					<a href="#"><i class="fa fa-facebook" style="font-size:20px;"></i></a>
					<a href="#"><i class="fa fa-twitter" style="font-size:20px;"></i></a>
					<a href="#"><i class="fa fa-instagram"style="font-size:20px;"></i></a>
					<a href="#"><i class="fa fa-linkedin"style="font-size:20px;"></i></a>
					<a href="#"><i class="fa fa-youtube"style="font-size:20px;"></i></a>
				</div>
			</div>
		</footer>
	  
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" ></script>
</html>