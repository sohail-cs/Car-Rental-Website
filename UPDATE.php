
<!DOCTYPE html>
<html>
   <head> 
			<meta charset = "utf - 8">
			<title> UPDATE PAGE  </title>
			<link rel="stylesheet" type="text/css" href="css_style.css">
			<style>
        
				table {
				margin-left: auto;
				margin-right: auto;
				}
			</style>
   </head>
			<body background="bg.jpg">
	         
			<!------------------------- ADDING LINKS TO OTHER PAGES  --------------------------->
			<span style="float: right;">
            <font color="white"><a href="homepage.html" style = "color:white">HOME</a></font>
            <font color="white"><a href="VIEW.php" style = "color:white">VIEW</a></font>
            <font color="white"><a href="ADD.html" style = "color:white">ADD</a></font>
            <font color="white"><a href="DELETE.php" style = "color:white">DELETE</a></font>
			<font color="white"><a href="CHARTS.html" style = "color:white">CHARTS</a></font>
			<font color="white"><a href="SIGNUP.html" style = "color:white">LOG OUT</a></font>
			</span>
		    
			<center> 
			<h3 style="color:white; text-align: center;">
		    <font size = "6"><br>UPDATE</font>
			
		<?php

        //DATABASE DETAILS
		$hostname = "localhost";
		$user = "root";
		$pass = "";
		$db = "car";
	    
		//ESTABLISHING DATABASE CONNECTION
		$conn= mysqli_connect($hostname,$user,$pass,$db);

			if(mysqli_connect_errno())
			{
				die("no connection: " .mysqli_connect_error());
			}
		
		//SQL QUERY TO SELECT ALL ROWS
		$result=mysqli_query($conn,"SELECT* from cars ORDER by id ASC");
		
		// DISPLAYING TABLE TO CONTAIN DATA 
		echo '<table border= 2 align="center">';
		echo '<tr>';
		echo'<br><br><br>';
		echo'<th> car_id</th>';
		echo '<th> Car NAME</th>';
		echo '<th> COLOR</th>';
		echo '<th> QUALITY</th>';
		echo '<th> PRICE/DAY</th>';
		echo '<th> AVAILABILITY</th>';
		echo '<th> UPDATE</th>';
		
		while($res=mysqli_fetch_array($result))
		{
			// FETCH DATA FROM DATABASE AND POPULATE TABLE 
			echo '<tr>';
			echo'<td>'.$res['id']. ' </td>';
			echo '<td>'.$res['car_name'].' </td>';
			echo '<td>'.$res['color'].' </td>';
			echo '<td>'.$res['quality'].' </td>';
			echo '<td>'.$res['price'].' </td>';
			echo '<td>'.$res['availability'].' </td>';
			echo '<td><a href="process-update.php?id=' . $res['id'] . '" style = "color:grren">UPDATE</a></td>';
			echo '</tr>';
	
		}
	  echo "</table>";
	  ?>
	  
	</body> 
	
</html>