<?php
session_start();
if(!isset($_SESSION["usern"])){
	header("Location: ". "form1.php");
	exit;
}


require("connect.php");

if(isset($_POST['submit'])){


$search=$_POST['search'];
if(!empty($_POST['search']))
		{
			$query1 = "SELECT * FROM participates  WHERE contestant_id = '$search'";
			$query2 = "SELECT * FROM events  WHERE event_id = '$search'";
			$query3 = "SELECT * FROM judged_by WHERE judge_id = '$search'";
			$query4 = "SELECT * FROM contestants  WHERE contestant_id = '$search'";
			$query5 = "SELECT * FROM contestants  WHERE contestant_id = '$search'";

			$result1 = mysqli_query($connection,$query1);
			$c1 = mysqli_num_rows($result1);
			echo $c1;
			$arr1=mysqli_fetch_assoc($result1);

			if(empty($arr1['contestant_id'])){

				echo "<center> <h3>Not Found</h3></center>";
			}

			else{
					while($c1){
				echo "<h3><center><table> <tr>  <th>Contestant ID</th> <th>First Name</th> <th>Last Name</th> <th>Gender</th><th>Country ID</th></tr> <tr>".
				"<td>".$arr1['contestant_id']."</td>".
				"<td>".$arr1['fname']."</td>".
				"<td>".$arr1['lname']."</td>".
				"<td>".$arr1['gender']."</td>".
				"<td>".$arr1['country_id'] .
				"</td></tr></table></center></h3>";
				$c1=$c1-1;
			}}
		}
}
else{
$search = "";
}

?>
<html>
    <head>
	    <style>
		    
		    body{font-family: Verdana;
		    background:  -webkit-linear-gradient(top, #F1F1F2 0%,#A1D6E2 50%, #1995AD 100%);
		    	}
            
            table{ color:#4F6457;  font-size:22px; border: transparent;}
			
			td{height:40px; width:200px; font-size: 18px; vertical-align: center; text-align: center;}
			
			fieldset{width:500px; border-color: #ACD0C0; color: #4F6457; line-height: 50px;}
		
			h3 { color: #4F6457; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }

			input { 
			width: 400px; margin-bottom: 10px; background: rgba(0,0,0,0.3);border: none;outline: none;
			padding: 10px;font-size: 13px;	color: #fff; text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
			border: 1px solid rgba(0,0,0,0.3); border-radius: 4px; transition: box-shadow .5s ease;}

			input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }
			
			.menu{width:200px;}

			.menu:hover{ opacity:0.7; top:0; right:-20px; transition: 0.5s;	}


			#des1{position:absolute; background: -webkit-linear-gradient(bottom,transparent,white);
  			-webkit-background-clip: text;-webkit-text-fill-color: transparent; opacity:0.3; z-index: -2;}

		
		</style>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
				<legend><h2>Search</h2></legend>
				<form method="post" action="search.php">
			
			<input type="text" name="search" placeholder="Search by Delegate No/ Name/ Email/ Phone No/ Reg No" required>
			<br>	

			<input class ='menu' type='submit' name='submit' value='Search'>
			<a href="welcome.php"><input type='button' name='back' value='Back' class='menu'></a>		
			<a href="logout.php"><input class='menu' type='button' name='logout' value='Logout'></a>
		</form>
			</fieldset>
		</center>
	</body>
</html>