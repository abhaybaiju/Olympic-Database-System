<?php
session_start();
if(!isset($_SESSION["usern"])){
	header("Location: ". "form1.php");
	exit;
}


require("connect.php");

if(isset($_POST['submit'])){
?>
<?php

	$contestant_id = htmlentities($_POST['contestant_id']);
	$country_id = htmlentities($_POST['country_id']);
	$event_id =htmlentities($_POST['event_id']);
	
	$query1 = "SELECT * FROM participates WHERE contestant_id = '$contestant_id' AND event_id = '$event_id' ";
	$result1 = mysqli_query($connection,$query1);
	$arr1 = mysqli_fetch_assoc($result1);
	
	// $query3 = "SELECT * FROM registrations WHERE email_id = '$email'";
	// $result3 = mysqli_query($connection,$query3);
	// $arr3 = mysqli_fetch_assoc($result3);
	
	
	// $query4 = "SELECT * FROM registrations WHERE phone_number = $phone";
	// $result4 = mysqli_query($connection,$query4);
	// $arr4 = mysqli_fetch_assoc($result4);
	
	//validations done here

	
		if(empty($arr1['contestant_id'])){
			$query = "INSERT INTO participates(contestant_id,country_id,event_id)
            VALUES ( '{$contestant_id}','{$country_id}','{$event_id}')";
           $result=mysqli_query($connection,$query);
           
           //$query2 = "SELECT * FROM contestants WHERE fname = '$fname'";
			//$result2 = mysqli_query($connection,$query2);
			// $arr2 = mysqli_fetch_assoc($result2);


           if($result){
		echo "<center>Registered Successfully</center>";}
	else{
		die("fail ". mysqli_error($connection));
           }
				}
				else{ echo "<center>Already registered</center>";}
			}
			
		
  ?>
<html>
    <head>
	    <style>
	    	body{font-family: Verdana;
		    background: -webkit-linear-gradient(top, #F1F1F2 0%,#A1D6E2 50%, #1995AD 100%);
		    	}
			table{ color:#4F6457;  font-size:22px; border: transparent; margin-top: -50px;}
			td{height:40px; width:200px; font-size: 18px; vertical-align: center;}


			input { 
			width: 100%; margin-bottom: 10px; background: rgba(0,0,0,0.3);border: none;outline: none;
			padding: 10px;font-size: 13px;	color: #fff; text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
			border: 1px solid rgba(0,0,0,0.3); border-radius: 4px; transition: box-shadow .5s ease;
			}
			input:focus {box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }
			
			
			fieldset{width:500px; border-color: #ACD0C0; color: #4F6457; line-height: 150px;}

			.menu:hover{ opacity:0.7; top:0; right:-20px; transition: 0.5s;	}


			#des1{position:absolute; background: -webkit-linear-gradient(bottom,transparent,white);
  			-webkit-background-clip: text;-webkit-text-fill-color: transparent; opacity:0.3; z-index: -2;}

		</style>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php $icon1 = "<i class = 'fa fa-user-circle-o '></i>"?>
		<?php $icon2 = "<i class = 'fa fa-id-card-o '></i>"?>
		<?php $icon3 = "<i class = 'fa fa-envelope-o'></i>"?>
		<?php $icon4 = "<i class = 'fa fa-phone'></i>"?>
	</head>
	<body>
		<i  id= 'des1' style=' top:350px; right:1140px;' class ='fa fa-snowflake-o fa-5x' aria-hidden='true'></i> 
		<i  id= 'des1' style=' top:30px; right:110px;' class ='fa fa-snowflake-o fa-5x' aria-hidden='true'></i> 
		<i  id= 'des1' style=' top:70px; right:1027px;' class ='fa fa-snowflake-o fa-5x' aria-hidden='true'></i> 
		<i  id= 'des1' style=' top:190px; right:360px;' class ='fa fa-snowflake-o fa-5x' aria-hidden='true'></i> 
		<i  id= 'des1' style=' top:485px; right:860px;' class ='fa fa-snowflake-o fa-5x' aria-hidden='true'></i>
		<i  id= 'des1' style=' top:400px; right:470px;' class ='fa fa-snowflake-o fa-5x' aria-hidden='true'></i>
		<i  id= 'des1' style=' top:225px; right:760px;' class ='fa fa-snowflake-o fa-5x' aria-hidden='true'></i> 
   	    <i  id= 'des1' style=' top:500px; right:20px;' class ='fa fa-snowflake-o fa-5x' aria-hidden='true'></i> 
   	    <i  id= 'des1' style=' top:89px; right:620px;' class ='fa fa-snowflake-o fa-5x' aria-hidden='true'></i> 
   	    <i  id= 'des1' style=' top:300px; right:120px;' class ='fa fa-snowflake-o fa-5x' aria-hidden='true'></i> 
	   
	   <center>
			<fieldset>
				<legend><h2>Register</h2></legend>
					<form method="post" action="participate.php">
						<table align="center">
							<tr>
								<td><?php echo $icon1;?> Contestant ID </td>
								<td colspan="2"><input type="text" placeholder="Enter Contestant ID" name="contestant_id" value="" required></td>
							</tr>
							<tr>
								<td><?php echo $icon4;?>Country ID </td>
								<td colspan="2"><input type="text" placeholder="Enter Country ID" name="country_id" required></td>
							</tr>
							<tr>
								<td><?php echo $icon2;?> Event ID</td>
								<td colspan="2"><input type="text" placeholder="Enter Event ID" name="event_id" required></td>
							</tr>			
							<center>
							</tr>
							<td><a href="welcome.php"><input type='button' name='back' value='Back' class='menu'></a>
							</td>
							<td>
							<input  type="submit" name="submit" value="Submit" class='menu'>
							<td><a href="logout.php"><input type='logout' name='logout' value='           Logout' class='menu'></a></td>
							</tr></center>
							
			
						</table>
					</form>
			</fieldset>
			</center>
	</body>
</html>