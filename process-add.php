<?php
            //DATABASE DETAILS
			$hostname = "localhost";
			$user = "root";
			$pass = "";
			$db = "car";
 
            //GETTING USER INPUTS
			$car_name=$_POST['car_name'];
			$color=$_POST['color'];
			$quality=$_POST['quality'];
			$price=$_POST['price'];
			$availability=$_POST['availability'];
		  
		    /////////////////////////// CHECK IF FIELDS ARE EMPTY   ///////////////////////////////////////// 
			if(empty($car_name) && empty($color)&& empty($quality)&& empty($price) && empty($availability))
				{
					$error = "PLEASE FILL ALL THE FIELDS"; 
				}
				
			if(!empty($error))
				{
					die($error);
				}
		  
		    //ESTABLISH DATABASE CONNECTION
			$mysqli= mysqli_connect($hostname,$user,$pass,$db);
		    
			//PREPARING SQL STATEMENT TO INSERT DATA INTO cars
			$stmt = $mysqli->prepare("INSERT INTO cars (car_name,color,quality,price,availability) VALUES (?,?,?,?,?)");
			
			//BINDING THE PREPARED STATEMENT 
			$stmt->bind_param("sssis",$car_name,$color,$quality,$price,$availability);
			
			if($stmt->execute())
				{    
					header("location:VIEW.php"); //IF EXECUTED SUCCESSFULLY GO TO VIE PAGE
				}
			
			else
				{
					echo "Not Successful";     // IF NOT SUCCESSFULL SHOW ERROR MESSAGE
				}
		
			 $stmt->close();
			 $mysqli->close();
			 ?>
	



	