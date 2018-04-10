<?php
session_start();
if(!isset($_SESSION["usern"])){
	header("Location: ". "form1.php");
	exit;
}


require("connect.php");
function has_presence($value)
   {
      return(isset($value) && $value !== "");
   
   }
   $errors = array();
$message = "";
   if(isset($_POST['submit']))
   { 
      
      $mysearch = mysqli_real_escape_string($connection,trim($_POST['search']));

      if(!has_presence($mysearch))
      {
         $errors["field"] = "Please enter details to Search.";
      }

      $query1 = "SELECT * FROM contestants WHERE contestant_id = '$mysearch'";
      $query2 = "SELECT * FROM contestants WHERE country_id = '$mysearch'";
      $query3 = "SELECT * FROM events WHERE event_id = '$mysearch'";
      $query4 = "SELECT * FROM  countries WHERE country_id = '$mysearch'";
      $query5 = "SELECT * FROM judges WHERE judge_id = '$mysearch'";

      $result1 = mysqli_query($connection,$query1);
      $result2 = mysqli_query($connection,$query2);
      $result3 = mysqli_query($connection,$query3);
      $result4 = mysqli_query($connection,$query4);
      $result5 = mysqli_query($connection,$query5);

      if(!$result1 || !$result2 || !$result3 || !$result4 || !$result5)
      {
         die("Database query failed");
      }

      $count1 = mysqli_num_rows($result1); 
      $count2 = mysqli_num_rows($result2);
      $count3 = mysqli_num_rows($result3);
      $count4 = mysqli_num_rows($result4);
      $count5 = mysqli_num_rows($result5);

      // $msg = "$count1 <br/> $count2 <br/> $count3 <br/> $count4 <br/> $count5 <br/>";

      if(empty($errors)) 
      {
         if($count1 == 0 && $count2 == 0 && $count3 == 0 && $count4 == 0 && $count5 == 0)
         {  
            $message = "No details found.";
         }
         else if($count1 == 1)
         {

            $q1 = "SELECT * FROM contestants natural join participates WHERE contestant_id = '$mysearch'";
            $r1 = mysqli_query($connection,$q1);

            if(!$r1)
            {
               die("Database query failed");
            }
            $c1 = mysqli_num_rows($r1);
            // echo " $c1  This is c1";
            // $message = "$c";*/
            $message .= "<center><table><tr> <th> Delegate Number</th> <th>Name</th>  <th>Registration Number</th> <th>Email ID</th> <th>Phone Number</th> </tr>";

            while ($row = mysqli_fetch_assoc($result1)) 
            {
               $message .= "<br/><tr><td>{$row['contestant_id']}</td>";
               $message .= "<td>{$row['fname']}&nbsp;&nbsp; </td>";
               $message .= "<td>&nbsp;&nbsp;{$row['lname']} </td>";
               $message .= "<td>{$row['gender']} </td>";
               $message .= "<td>{$row['country_id']}</td></tr>";
               
            }
            $message .= "</table></center>";
            $message .= "<br/><br/><br/><br/><br/><br/><br/>";

            if($c1 > 0)
            {
              $message .= "<center><table><tr> <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Event(s) registered for: <th><br/></tr>";
              while ($row = mysqli_fetch_assoc($r1)) 
              {
                $message .= "<tr><td>{$row['event_id']}</td></tr>";
              }
              $message .= "</table></center>";

            }

            
         }

         else if($count2 == 1)
         {

            $q2 = "SELECT * FROM contestants natural join participates WHERE country_id = '$mysearch'";
            $r2 = mysqli_query($connection,$q2);
            if(!$r2)
            {
               die("Database query failed");
            }
            $c2 = mysqli_num_rows($r2);
            // echo " $c2  This is c2";
            // $msg = "$c2";
            $message = "<center><table><tr> <th>Delegate Number</th>  <th>Name</th>  <th>Registration Number</th>  <th>Email ID</th>  <th>Phone Number</th> </tr>";

            while ($row = mysqli_fetch_assoc($result2)) 
            {
               $message .= "<br/><tr><td>{$row['contestant_id']}</td>";
               $message .= "<td>{$row['fname']}&nbsp;&nbsp; </td>";
               $message .= "<td>&nbsp;&nbsp;{$row['lname']} </td>";
               $message .= "<td>{$row['gender']} </td>";
               $message .= "<td>{$row['country_id']}</td></tr>";
               
            }
            $message .= "</table></center>";
            $message .= "<br/><br/><br/><br/><br/><br/><br/><br/>";

            if($c2 > 0)
            {
              $message .= "<center><table><tr> <th>Event(s) registered for: <th><br/></tr>";
              while ($row = mysqli_fetch_assoc($r2)) 
              {
                $message .= "<tr><td>{$row['event_id']}</td></tr>";
              }
              $message .= "</table></center>";

            }

            
         }
         elseif ($count3 == 1) 
         {
           # code...
             $message = "<center><table><tr> <th>Category ID&nbsp;&nbsp;&nbsp;&nbsp;</th> <th>Event ID</th> <th>Event Name</th>  <th>Day</th> <th>&nbsp;&nbsp;&nbsp;&nbsp;Duration(hrs)</th> <th>&nbsp;&nbsp;&nbsp;&nbsp;Room Number</th> </tr>";

             while ($row = mysqli_fetch_assoc($result3)) 
             {
                $message .= "<br/><tr><td>{$row['event_id']}</td>";
                $message .= "<td>{$row['name']}&nbsp;&nbsp; </td>";
                $message .= "</tr>";
                
             }

             $message .= "</table></center>";
          
         }
         elseif ($count4 == 1) 
         {
           # code...
          $message = "<center><table><tr> <th>Category ID&nbsp;&nbsp;</th> <th>Category Name&nbsp;&nbsp;</th></tr>";

          while ($row = mysqli_fetch_assoc($result4)) 
          {
             $message .= "<br/><tr><td>{$row['country_id']}</td>";
             $message .= "<td>{$row['name']}</td>";
             $message .= "</tr>";
          }

          $message .= "</table></center>";
         }
         elseif ($count5 == 1) 
         {
           # code...
          $q3 = "SELECT * FROM judges natural join judged_by WHERE judge_id = '$mysearch'";
          $r3 = mysqli_query($connection,$q3);
          if(!$r3)
          {
             die("Database query failed");
          }
          $c3 = mysqli_num_rows($r3);
          // $msg = "$c1";
          if($c3 > 0)
          {
            $message = "<center><table><tr> <th>Event ID&nbsp;&nbsp;</th> <th>Judge ID&nbsp;&nbsp;</th> <th>Name</th> <th>Contact Number</th> </tr>";

            while ($row = mysqli_fetch_assoc($r3)) 
            {
              $message .= "<br/><tr><td>{$row['event_id']}</td>";
              $message .= "<td>{$row['judge_id']}</td>";
              $message .= "<td>{$row['fname']}&nbsp;&nbsp; </td>";
              $message .= "<td>&nbsp;&nbsp;{$row['lname']} </td></tr>";
            }

            $message .= "</table></center>";
          }
        
          else
          {
            $message = "<center><table><tr> <th>Judge ID&nbsp;&nbsp;</th> <th>Name</th> <th>Contact Number</th> </tr>";

            while ($row = mysqli_fetch_assoc($result5)) 
            {
              
              $message .= "<br/><tr><td>{$row['judge_id']}</td>";
              $message .= "<td>{$row['fname']}&nbsp;&nbsp; </td>";
              $message .= "<td>&nbsp;&nbsp;{$row['lname']} </td></tr>";
            }

            $message .= "</table></center>";
          
         }}
         else
         {
            $message = "No records found.";
         }
      }
      else
      {
        $message = "Invalid action.";
      }
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
				<?php echo "  $message "?>
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