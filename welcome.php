<?php
session_start();
if(!isset($_SESSION["usern"])){
	header("Location: ". "form1.php");
	exit;
}
?>
<html>
    <head>
	    <style>
		    body{font-family: Verdana;
		   background:  -webkit-repeating-linear-gradient(top, #F1F1F2 0%,#A1D6E2 50%, #1995AD 100%); 
		    	}
fieldset{width:500px; border-color: #ACD0C0; color: #4F6457;}
		
h1 { color: #4F6457; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }

input { 
			width: 200px; margin-bottom: 10px; background: rgba(0,0,0,0.3);border: none;outline: none;
			padding: 10px;font-size: 13px;	color:  ; text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
			border: 1px solid rgba(0,0,0,0.3); border-radius: 4px; transition: box-shadow .5s ease;
			}
			input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }
			.menu{color:white;}
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
	   
		<?php $ID = $_SESSION["usern"];?>
		<center>
			<h1>Welcome Administrator <?php echo $ID ?></h1>
			<a href="register.php"><input type='submit' class='menu' name='register' value='Register'></a>
			<a href="participate.php"><input type='submit' class='menu' name='participate' value='Participate'></a>
			<a href="search.php"><input type='submit' class ='menu' name='search' value='Search'></a>
			<a href="logout.php"><input type='submit' class='menu' name='logout' value='Logout'></a>
		</center>
	</body>
</html>