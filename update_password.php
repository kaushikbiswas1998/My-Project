<?php
session_start();
 $connection = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($connection,"library management system");
            $password="";
             $query = "select * from users where email = '$_SESSION[email]'";
            $query_run = mysqli_query($connection,$query);
            if($row = mysqli_fetch_assoc($query_run)){
            	$password=$row['password'];

            }
            if($password == $_POST['old_password']){
            	$query = "update users set password = '$_POST[new_password]'where email = '$_SESSION[email]'";
            }
            ?>

           <script type="text/javascript">
           	alert("Password Updated Successfully");
           	window.location.href="user_dashboard.php";
           </script>