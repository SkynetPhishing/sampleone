<!DOCTYPE html>
<html>
<head>
<style>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>

input,
textarea,
select {
  font-family: 'Open Sans', sans-serif;
  font-size: 16px;
  color: #4c4c4c;
}

p {
  font-size: 12px;
  width: 150px;
  display: inline-block;
  margin-left: 4px;
}
h1 {
  font-size: 32px;
  font-weight: 300;
  color: #4c4c4c;
  text-align: center;
  padding-top: 10px;
  margin-bottom: 10px;
}

html{
  background-color: #ffffff;
}

.testbox {
  margin: 20px auto;
  width: 500px; 
  height: 900px; 
  border-radius: 8px/7px; 
  background-color: #ebebeb; 
   box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
  border: solid 2px #cbc9c9;
}

input[type=radio] {
  visibility: hidden;
}

form{
  margin: 0 40px;
}


hr{
  color: #a9a9a9;
  opacity: 0.3;
}

input[type=text],input[type=password]{
  width: 200px; 
  height: 45px; 
  -webkit-border-radius: 0px 4px 4px 0px/5px 5px 4px 4px; 
  -moz-border-radius: 0px 4px 4px 0px/0px 0px 4px 4px; 
  border-radius: 0px 4px 4px 0px/5px 5px 4px 4px; 
  background-color: #fff; 

  box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
  border: solid 1px #cbc9c9;
  margin-left: -5px;
  margin-top: 13px; 
  padding-left: 10px;
}

input[type=password]{
  margin-bottom: 25px;
}


a.button {
  font-size: 16px;
  font-weight: 600;
  color: white;
  padding: 6px 25px 0px 20px;
  margin: 10px 8px 20px 0px;
  display: inline-block;
  float: right;
  text-decoration: none;
  width: 50px; height: 27px; 
 
  border-radius: 5px; 
  background-color: #3a57af; 
 
  box-shadow: 0 3px rgba(58,87,175,.75);
  transition: all 0.1s linear 0s; 
  top: 0px;
  position: relative;
}




</style>
</head>
<body>

<div class="testbox">
  <h1>Registration</h1>

  <form action="" method="post">
    
  <label for="fname" style="color:red" > Company Name:</label><br>
  <input type="text" name="company" id="name" placeholder="company name" style="width:300px" required/><br><br>
  <label for="fname" style="color:red"> Employer Name:</label><br>
  <input type="text" name="employee" id="name" placeholder="Name" style="width:300px"required/><br><br>
<label for="fname" style="color:red"> Company website:</label><br>
 <input type="text" name="website" id="name" placeholder="company website name" style="width:300px"required/><br><br>
   <label for="fname" style="color:red"> Company Address:</label><br>
  <input type="text" name="address" id="name" placeholder="Address" style="width:300px"required/><br><br>
   
  <label for="fname" style="color:red"> Username(email):</label><br>
  <input type="text" name="email" id="name" placeholder="abc@gamil.com"  style="width:300px" required/><br><br>
 
   <label for="fname" style="color:red"> Password:</label><br>
  <input type="password" name="password" id="name" placeholder="Password" style="width:300px" required/><br>
  
  <label for="fname" style="color:red">Confirm password:</label><br>
  <input type="password" name="cpassword" id="name" placeholder="Password" style="width:300px" required/><br><br>
   <p>By clicking Register, you agree on our <a href="#">terms and condition</a>.</p>
    <input type="submit" name="submit" class="button" value="Register">
   
  </form>
</div>

</body>
</html>