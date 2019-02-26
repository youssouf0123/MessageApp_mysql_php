<?php
$conn = mysqli_connect("localhost","root","eminem0123","messageapp");
// Test. connection
if(mysqli_connect_errno()){
	echo "db connection error :".mysqli_connect_error();
}


?>