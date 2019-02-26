<?php include "db.php"?>
<?php
if(!empty($_POST["text"]) && !empty($_POST["user"])){
	$text = mysqli_real_escape_string($conn,$_POST["text"]);
	$user = mysqli_real_escape_string($conn,$_POST["user"]);
	$query = "INSERT INTO messages(text,users) VALUES ('$text', '$user')";
	$add = mysqli_query($conn,$query);
	if(!$add){
		die(mysqli_error($conn));
	} else {
		header("location: msg.php?success=Message%20added");
	}
} else {
	header("location: msg.php?error=Please%20fill%20in%20all%20fields");
}

 ?>
