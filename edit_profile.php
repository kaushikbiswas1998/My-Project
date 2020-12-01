<?php
session_start();
$connection = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($connection,"library management system");
            $name = "";
            $email = "";
            $mobile = "";
            $address = "";
            $query = "select * from users where email = '$_SESSION[email]'";
            $query_run = mysqli_query($connection,$query);
            if ($row = mysqli_fetch_assoc($query_run)){
              $name = $row['name'];
              $email = $row['email'];
              $mobile = $row['mobile'];
              $address = $row['address'];
            }
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Dashboard</title>
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
    			<a class="navbar-brand" href="user_dashboard.php">Library Management System</a>
    		</div>
       <font style="color:white"> <span><strong>Welcome: <?php echo $_SESSION['name']; ?></strong></span></font>
       <font style="color:white"> <span><strong>Email id: <?php echo $_SESSION['email']; ?></strong></span></font>
    		<div class="dropdown nav navbar-right">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">My Profile
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href ="view_profile.php">View Profile</a></li>
      <li><a class="dropdown-item" href="edit_profile.php">Edit Profile</a></li>
      <li><a class="dropdown-item" href = "changepassword.php">Change Password</a></li>
    </ul>
    <div class ="nav-item"><a class="nav-link" href="logout.php-">Logout</a></div>
  </div>
    			
    </nav><br>
    <span><marquee>Welcome to Library Management System</marquee></span><br><br>
    <div class = "row">
      <div class ="col-md-4"></div>
      <div class ="col-md-4">
        <form action="update_profile.php" method="post">
          <div class = "form-group">
            <label>Name</label>
            <input type="text" class="form-control" value="<?php echo $name;?>" name="name"><br>
            <label>Email id</label>
            <input type="text" class="form-control" value="<?php echo $email;?>" name="email"><br>
            <label>Mobile Number</label>
            <input type="text" class="form-control" value="<?php echo $mobile;?>" name="mobile"><br>
            <label>Address</label>
            <textarea rows="3" cols="40" name="address"= class="form-control"><?php echo $address;?></textarea><br>
            <button class="btn btn-primary" type="submit" name="update">Click to Update</button>
          </div>
        </form>
        <div class ="col-md-4"></div>