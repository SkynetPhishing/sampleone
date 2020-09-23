<?php  
 include_once('config.php');
 $query = "SELECT no_of_users,link_clicked,details_given FROM campaign_generated where usercampaign_id=1";  
 $result = mysqli_query($db, $query);
 if($result)
 {
	echo"1";
	$row=mysqli_fetch_array($result);
 }
else
	echo"2";
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
          <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Red+Rose&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Gayathri&display=swap" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/st.css">
           <title></title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
		   //document.getElementById("demo").innerHTML = "Paragraph changed!";
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart); 
           function drawChart()  
           {  
				//document.getElementById("pi").innerHTML="hello";
                var data = google.visualization.arrayToDataTable([  
                          ['issue', 'Number'],  
                          <?php  
                               echo "['No of users Clicked', ".$row["link_clicked"]."],"; 
							   echo "['No of users didnot click', ".($row["no_of_users"]-$row["link_clicked"])."],"; 
							   //echo "['".$row["gender"]."', ".$row["number"]."],"; 
                            
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Users clicked and no of users ignored',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart1'));  
                chart.draw(data, options); 
		   } 
		   //document.getElementById("demo").innerHTML = "Paragraph changed!";
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart2); 
           function drawChart2()  
           {  
				//document.getElementById("pi").innerHTML="hello";
                var data = google.visualization.arrayToDataTable([  
                          ['issue', 'Number'],  
                          <?php  
                               echo "['No of users given Credentails', ".$row["details_given"]."],"; 
							   echo "['No of users didnot give credentails', ".($row["no_of_users"]-$row["details_given"])."],"; 
							   //echo "['".$row["gender"]."', ".$row["number"]."],"; 
                            
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Users given credentails and no of users ignored',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));  
                chart.draw(data, options); 
		   }
         google.charts.setOnLoadCallback(drawChart3);
		   function drawChart3() {
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['issue', 'number'],
               ['total no of users',  <?php echo $row["no_of_users"] ?> ],
               ['No of users clicked the link',  <?php echo $row["link_clicked"] ?>],
               ['No of users gave credentials',  <?php echo $row["details_given"] ?>],
            ]);

            var options = {title: 'Campaign detials'}; 

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('bargraph'));
            chart.draw(data, options);
		   }
           </script>  
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
              <a class="nav-link" href="mycamp.php">My Campaign</a>
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
           <br /><br />  
           <div style="width:900px;">  
                <div id="piechart1" style="width: 700px; height: 300px;"></div> 				
           </div>  
		   <div style="width:900px;">  
                <div id="piechart2" style="width: 700px; height: 300px;"></div> 				
           </div>
			<div style="width:900px;">  
                <div id="bargraph" style="width: 700px; height: 300px;"></div> 				
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
 </html>  