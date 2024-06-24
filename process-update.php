<!DOCTYPE html>
<html>
	<head>
			
			<meta charset="utf-8">
			<title> UPDATE PAGE </title>
			<style>
				body
				{
					background-image:url("bg.jpg");
					background-repeat:no-repeat;
					background-size:cover;
					display:flex;
					justify-content:center;
					align-items:center;
					height:100vh;
					color:white;
				}
		
				</style>
	</head>
<body>
       
				
		
		<?php
		//DATABASE DETAILS
		$host = "localhost";
		$user = "root";
		$pass = "";
		$db = "car";
	    
		//Establishing database connection
		$mysqli = mysqli_connect($host,$user,$pass,$db);
		
		//CHECK IF THERE IS ANY ERROR
		if(mysqli_connect_errno())
			{
				echo "error"; // DISPLAY ERROR 
			}
		        // CHECK IF REQUEST METHOD IS POST 
				if($_SERVER['REQUEST_METHOD'] === 'POST')
				{ 
			        //RETRIEVE VALUES FROM POST
					$id = $_POST['id'];
					$car_name = $_POST['car_name'];
					$color = $_POST['color'];
					$quality = $_POST['quality'];
					$price = $_POST['price'];
					$availability = $_POST['availability'];
			        
					//SQL QUERY TO UPDATE cars WITH PROVIDED DATA 
					$sql = "UPDATE cars SET car_name = '$car_name' , color = '$color',quality ='$quality' , price = '$price',availability ='$availability' WHERE id = $id";
			
					if(mysqli_query($mysqli,$sql))
						{
						  //IF QUERY IS SUCCESSFUL DISPLAY MESSAGE AND GO TO UPDATE PAGE
							echo "Update successful";
							header("location:UPDATE.php");
						}
					
					else
						{
							//IF QUERY NOT SUCCESSFULL SHOW ERROR MESSAGE 
							echo "Update not successful ";
						}
			}
			
		else 
		{       
	            // RETRIEVE VALUE OF ID FROM QUERY STRING IN THE URL 
				$id = $_GET['id']; 
				
				//SQL QUERY TO SELECT ROWS WHERE THE ID MATHCHES 
				$result = mysqli_query($mysqli,"SELECT * FROM cars WHERE id = $id");
				
				// FETCH FIRST ROW FROM QUERY RESULT
				$row = mysqli_fetch_assoc($result);
				
				//CHECK IF ROW IS EMPTY 
				if(!$row)
				{
					//IF EMPTY DISPLAY MESSAGE
					echo "NO RECORD FOUND ";
				}
			
				else
			        {
					
			            ?>
							<center> 
							<h3 style="color:white; text-align: center;">
							<font size = "6"><br>UPDATE </font>
						<!-------------------------MAKING FORM FOR UPDATING DATA------------------------------------->
							<form method="POST" action="process-update.php">
							<input type="hidden" name="id" value="<?php echo $row['id'];?>">
							car_name: <input type="text" name="car_name" value="<?php echo $row['car_name']; ?>"> <br>
							color: <input type="text" name="color" value="<?php echo $row['color']; ?>"> <br>
							quality: <input type="text" name="quality" value="<?php echo $row['quality']; ?>"> <br>
							price : <input type="text" name="price" value="<?php echo $row['price']; ?>" > <br>
							availabilty: <input type="text" name="availability" value="<?php echo $row['availability']; ?>" > <br>
							 <input type="submit" value="Update">
							 </form>
							 <?php
				    }
		}
		mysqli_close($mysqli);
		?>
</body>
</html>