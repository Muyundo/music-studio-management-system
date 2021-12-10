<?php
$conn = mysqli_connect("localhost", "my_working", "Brian1234", "studio");

if(!$conn){
	die("Error: Database could not connect".mysqli_connect_error());
}


?>