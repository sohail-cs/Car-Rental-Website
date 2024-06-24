
<!DOCTYPE html>
<html>
   <head> 
         <meta charset = "utf - 8">
		<title> VIEW PAGE  </title>
		<link rel="stylesheet" type="text/css" href="css_style.css">
		<style>
        
			table {
            margin-left: auto;
            margin-right: auto;
			}
		
		.title
		{
          color:white;
          text-align:center;
		  margin-top:50px;
		}
		
		</style>
   </head>
		<body background="bg.jpg">
	 
		<span style="float: right;">
		   <!------------------ ADDING LINKS TO OTHER PAGES ------------------------------------->
            <font color="white"><a href="homepage.html" style = "color:white">HOME</a></font>
            <font color="white"><a href="ADD.html" style = "color:white">ADD</a></font>
            <font color="white"><a href="UPDATE.php" style = "color:white">UPDATE</a></font>
            <font color="white"><a href="delete.php" style = "color:white">DELETE</a></font>
			<font color="white"><a href="CHARTS.html" style = "color:white">CHARTS</a></font>
			<font color="white"><a href="index.html" style = "color:white">LOG OUT</a></font>
        </span>
		    
	  <center> 

		<h3 class="title">
		    <font size = "6"><br>VIEW </font>
			
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
	 
	 // SQL QUERY TO SELECT ALL ROWS FOR cars
	 $result=mysqli_query($conn,"SELECT* from cars ORDER by id ASC"); 
	 
	 //DISPLAY TABLE CONTAINING DATA
	 echo '<table border= 2 align="center">';
	 echo '<tr>';
	 echo'<br><br><br>';
	 echo '<th> car.id</th>';
	 echo '<th> Car NAME</th>';
	 echo '<th> COLOR</th>';
	 echo '<th> QUALITY</th>';
	 echo '<th> PRICE/DAY</th>';
	 echo '<th> AVAILABILITY</th>';

	 while($res=mysqli_fetch_array($result))
	 {   
        //FETCHING EACH ROW OF DATA AND POPULATING TABLE
		 echo '<tr>';
	     echo'<td>'.$res['id']. ' </td>';
		 echo '<td>'.$res['car_name'].' </td>';
		 echo '<td>'.$res['color'].' </td>';
		 echo '<td>'.$res['quality'].' </td>';
		 echo '<td>'.$res['price'].' </td>';
		 echo '<td>'.$res['availability'].' </td>';
		 echo '</tr>';
	 }
	  echo "</table>";
	  ?>
</html>