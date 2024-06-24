<!DOCTYPE html>
<html>
	<head>
		<title>LOGIN PAGE</title>
	</head>
		<body background="bg.jpg">
			<h1><font color="white">LOGIN</font></h1>
			<?php
			    //establishing database connection 
				$hostname = "localhost";
				$user     =  "root";
				$pass     = "";
				$db       = "signup";
			  
				// retriving user inputs
				$username=$_POST['username'];
				$password=$_POST['password'];
			  
				$mysqli=mysqli_connect($hostname,$user,$pass,$db);
			  
				if($mysqli->connect_error)
				{
					die ("no connection : ".$mysqli->connect_error);
				}
			  
			 
				if($_SERVER['REQUEST_METHOD'] === 'POST')  //check if form is submitted
				{
				  //retrive username and password
				$login_username = $_POST['username'];
				$login_password = $_POST['password'];
			   
			   if(empty($login_username) || empty($login_password))
			   {
				   echo '<span style="color:white;">ENTER USERNAME AND PASSWORD</span>';
			   }
			   else
			   {
				   //query the database to check username and password
				 $query = "SELECT * FROM users WHERE username = '$login_username' AND password = '$login_password'"; 
				 $result = $mysqli->query($query);
				
				 if($result->num_rows >0)  // if row is retuned ,login success
				 {
					 echo "Login Successful";
					 header("location:homepage.html");
				 }
				 else
				 {
					echo '<span style="color:white;">ENTER VALID USERNAME AND PASSWORD</span>';
				 }
			   }
			  }
           ?>
           
            <form method="POST" action="">
			    
				<!--- form for getting user input--->
				<label for="username" style="color:white;">username:</label>
				<input type="text" name="username" id="username" autocomplete="off"><br><br>
				
				<label for="password" style="color:white;">password:</label>
				<input type="password" name="password" id="password"><br><br>
				<input type="submit" value="login">
		    </form>
		 </body>
		</html>
			
