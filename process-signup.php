<!DOCTYPE html>
<html>
	<head>
		<title>SIGNUP PAGE</title>
			<style>
			 body
			{
			   color:white;
			}
			</style>
	</head>
		
		<body background="bg.jpg">
		<h1><font color="white">SIGNUP</font></h1>

		<?php
        // making database connection
        $hostname = "localhost";
	    $user = "root";
	    $pass = "";
	    $db = "signup";
        
		// retreivieng user input
		$name=$_POST['name'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$mysqli=mysqli_connect($hostname,$user,$pass,$db);
				
			if(empty($name) || empty($username) || empty($password))
			   {
				   echo '<font color="white">ENTER NAME , USERNAME AND PASSWORD</font>'; //checking if fields are empty
			   }
			   
			
		  else
				{
					//$mysqli=mysqli_connect($hostname,$user,$pass,$db);
		  
					$query="INSERT into users(name,username,password) values(?,?,?)";
		     
					$stmt = mysqli_prepare($mysqli,$query);
			 
					mysqli_stmt_bind_param($stmt,"sss",$name,$username,$password);
			 
					$result = mysqli_stmt_execute($stmt);
			 
			 
					if($result){
						echo "Signup Sucessful";
						header("location:homepage.html");
					}
		  	
		   
					else 
					{
						echo " Signup failed";
						
				
					}
		  }
		  
		 if(!empty($error))
			{
				die($error);
			}   
    
			 ?>
			 <form method="POST" action="" color = "white">
				
				<!---- making fields for the details --->
				<label for="name">name:</label>
				<input type="text" name="name" id="name" autocomplete="off"><br><br>
				
				<label for="username">username:</label>
				<input type="text" name="username" id="username"autocomplete="off"><br><br>
				
				<label for="password">password:</label>
				<input type="password" name="password" id="password" autocomplete="off"><br><br>
				
				<input type="submit" value="signup">
		    </form>
		 </body>
		</html>
	

	

	
    
