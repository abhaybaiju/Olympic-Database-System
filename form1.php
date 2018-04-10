<?php
require("connect.php");
session_start();

if(isset($_POST['submit'])){

$ID=$_POST["usern"];
$Password=$_POST["pass"];

	
	if(!empty($_POST['usern']))
		{
			$query2 = "SELECT * FROM admin WHERE id = '$_POST[usern]' AND pass = '$_POST[pass]'";
			$result2 = mysqli_query($connection,$query2);
			$arr2=mysqli_fetch_assoc($result2);
			
			$query1 = "SELECT * FROM admin WHERE id = '$_POST[usern]' ";
			$result1 = mysqli_query($connection,$query1);
			$arr1=mysqli_fetch_assoc($result1);
			}
			if(empty($arr1['id'])){

				echo "<center> <h3 style='color:#4F6457'>Wrong ID</h3></center>";

			}

			else if (empty($arr2['id']) AND empty($arr2['pass'])){ 
				echo "<center><h3 style='color:#4F6457'>The password is incorrect. Please try again.</h3></center>";}

			else  { 
				$_SESSION['usern']= $_POST["usern"] ;
				echo  "<br><br><br><center>

				<a href = 'welcome.php?id=$ID'>

				<input class='menu' type='submit' name='login' value='Login'>

			</a>
			<a href = 'form1.php?'>

				<input class='menu' type='reset' name='reset' value='Use another user'>

			</a>
			</center>"; }
			
			 
		}

else{
$ID = "";
}
?>

<html>
    <head>
	    <style>
	    	body{font-family: Verdana;
		    background:  -webkit-repeating-linear-gradient(top, #F1F1F2 0%,#A1D6E2 50%, #1995AD 100%);
		    	overflow: hidden;}
			table{color:#4F6457;  font-size:22px; border: transparent; margin-top: -90px;}
			td{height:40px; width:200px; color:#4F6457;}

			input::-webkit-input-placeholder {color:#4F6457 ;}

			input { 
			width: 100%; margin-bottom: 10px; background: rgba(0,0,0,0.3);border: none;outline: none;
			padding: 10px;font-size: 13px;	color: #fff; text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
			border: 1px solid rgba(0,0,0,0.3); border-radius: 4px; transition: box-shadow .5s ease;
			}
			input:focus {color:#ADACB8 ; box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }
			
			#sub:hover{ opacity:0.7; top:0; right:-20px; transition: 0.5s;	}

			#des1{position:absolute; background: -webkit-linear-gradient(bottom,transparent,white);
  			-webkit-background-clip: text;-webkit-text-fill-color: transparent; opacity:0.3; z-index: -2;}

			h1 { color: #ADACB8; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }
			h3 { color: #ADACB8 text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }


			.menu{width:200px;}
			.menu:hover{ opacity:0.7; top:0; right:-20px; transition: 0.5s;	}


			
			fieldset{width:600px; height:300px; position:absolute; border-color: #ACD0C0; color: #4F6457; line-height: 200px; top:55px; left:355px;}
		</style>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script type="text/javascript" src="design.js"></script>
		<?php $icon1 = "<i class = 'fa fa-user-circle-o '></i>"?>
		<?php $icon2 = "<i class = 'fa fa-unlock '></i>"?>
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
	   	<div id='particle-js'>&nbsp;</div>
			<fieldset>
				<legend><h2>Sign In</h2></legend>
					<form method="post" action="form1.php">
						<table align="center">
							<tr>
								<td><?php echo $icon1;?> Id </td>
								<td colspan="2"><input type="text" placeholder="Enter ID" name="usern" value="<?php echo  $ID ?>" required></td>
							</tr>
							<tr>
								<td><?php echo $icon2;?> Password</td>
								<td colspan="2"><input type="password" placeholder="Enter password" name="pass" required></td>
							</tr>
							<center>
							</tr>
							<td>
							</td>
							<td>
							<input  type="submit" id="sub" name="submit" value="Submit">
							<td></td>
							</tr></center>
							
						
						</table>
					
					</form>

			</fieldset>
			</center>
		<script type="text/javascript" src="particles.js"></script>
	</body>
</html>