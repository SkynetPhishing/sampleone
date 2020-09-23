
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Red+Rose&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600&display=swap" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/st.css">
    <link rel="stylesheet" href="CSS/login_new.css">
	
	
    <title>Catchers</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#" target="blank">
            <img src="images/logo.png" width="40" height="30" class="d-inline-block align-top" alt="">
            Catchers
          </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="Login.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="Login.php">Start Campaign</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="Login.php">My Campaign</a>
            </li>
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Stats
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Pie-Chart</a>
                <a class="dropdown-item" href="#">Candle</a>
                <a class="dropdown-item" href="#">Graphs</a>
              </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="Login.php">Login/Sign-Up</a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container">
          
                <div id="error"><?php if ($error!="") {
    echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
    
} ?></div>
          <h2 class="sign">Sign In</h2>
          <form action="" method="post">
            <fieldset>  
            <div class="form-group">
                <label for="exampleFormControlInput1">Email or phone</label>
                <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Email or phone" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Enter password" required>
            </div>
            <div class="login">
                <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
            </div>
            <div class="register">
                <h4>New User</h4>
                <button type="button" class="btn btn-primary"><a href="Signup.php">Register</a></button>
            </div>
            </fieldset>
          </form>
      </div>


	  <footer class="footer-distributed">

			<div class="footer-left">
         
				<h3>About<span>SKynet</span></h3>

				<p class="footer-links">
					<a href="Login.php">Home</a>
					|
					<a href="Login.php">campaign</a>
					|
					<a href="Login.php">About us</a>
					|
					<a href="Login.php">Login</a>
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
<script src="script.js"></script>
</html>