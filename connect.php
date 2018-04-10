<?php 
$connection = mysqli_connect("localhost","root","meridilli","olympics");
if(mysqli_connect_errno()){
	die("Connection failed: ".
        mysqli_connect_error() . 
        "(" . mysqli_connect_errno() . ")"
);
} ?>