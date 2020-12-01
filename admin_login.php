<!DOCTYPE html>
<html>
<head>
	<title>Library Management System</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Ovo&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style type="text/css">
  	#side_bar{
  		background-color: whitesmoke;
  		padding: 50px;
  		width: 300px;
  		height: 450px;
  	}
  </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    	<div class="container-fluid">
    		<div class="navbar-header">
    			<a class="navbar-brand" href="index.php">Library Management System</a>
    		</div>
    		<ul class="nav navbar-nav navbar-right">
    			<li class="nav-item">
    				<a class="nav-link" href="adminlogin.php">Admin Login</a>
    			</li>
    			<li class="nav-item">
    				<a class="nav-link" href="index.php">User Login</a>
    			</li>
    			<li class="nav-item">
    				<a class="nav-link" href="Signup.php">Register Here</a>
    			</li>
    		</ul>
    	</div>
    </nav><br>
    <span><marquee>Welcome to Library Management System</marquee></span><br><br>
    <div class= "row">
    	<div class="col-md-4" id="side_bar">
    		<h5> Library Timings and Schedule</h5>
    		<ul>
    			<li>Library opens at: 8:00</li>
    			<li>Library closes at: 21:00</li>
    			<li>Saturday timing: 8:00 To 16:00</li>
    			<li>Sunday Off</li>
    			<li>Holidays at Festival</li>
    		</ul>
    		<h5>What we provide</h5>
    		<ul>
    			<li>Full furniture</li>
    			<li>Free Wifi</li>
    			<li>News papers</li>
    			<li>Discussion Rooms</li>
    			<li>RO water</li>
    			<li>Peacefull Environment</li>
    		</ul>
    	</div>
    	<div class="col-md-8" id="main_content">
    		<center><h4>Admin Login</h4></center><br>
    		<form action="" method="POST">
    			<div class="form-group">
    				<label for="name">Email ID:</label>
    				<input type="text" name="email" class="form-control" required>
    			</div>
    			<div class="form-group">
    				<label for="name">Password:</label>
    				<input type="password" name="password" class="form-control" required>
    			</div>
    		
    			<button type="submit" name="Login" class="btn btn-primary">Click to Login</button>
    		</form>
            
            <?php
              session_start();
            if(isset($_POST['Login'])){
            $connection = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($connection,"library management system");
            $query = "select * from users where email = '$_POST[email]'";
            $query_run = mysqli_query($connection,$query);
            if ($row = mysqli_fetch_assoc($query_run)){
            if ($row['email'] == $_POST['email']){
            if ($row['password'] == $_POST['password']){
                  $_SESSION['name'] = $row['name'];
                  $_SESSION['email'] = $row['email'];
                  header("location:admin_dashboard.php");

        }
        else{
            ?>
            <br><br><center><span class = "alert-danger">Wrong Password</span></center>
            <?php
    }
        }
   
        }
        else {
        ?>
            <br><br><center><span class = "alert-danger">No record found! You have not registered yet.Kindly make sure to register first and then login.</span></center>
            <?php
    }

    }

        ?>
    </div>

</body>
</html>