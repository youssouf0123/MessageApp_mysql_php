<?php 
include "db.php"
?>
<?php 
 $query = "SELECT * FROM messages ORDER BY date DESC";
 $message = mysqli_query($conn,$query);
 if(isset($_GET["action"]) == "delete" && isset($_GET["id"])){
 	$id = $_GET["id"];
	$query = "DELETE FROM messages WHERE id= $id";
	$add = mysqli_query($conn,$query);
	if(!$add){
		die(mysqli_error($conn));
	} else {
		header("location: msg.php?success=Message%20removed");
	}
 }
 if(isset($_GET["error"])){
 	$error = $_GET["error"];
 }
 if(isset($_GET["success"])){
 	$success = $_GET["success"];
 }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>MessageApp</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
	<header><h1>MessageApp</h1></header>
	<?php if(isset($error)):;?>
		<div class="alert"> <?php echo $error; ?> </div>
	<?php endif; ?>
	<?php if(isset($success)):;?>
		<div class="success"> <?php echo $success; ?> </div>
	<?php endif; ?>
	<div class="main">
		<form method="POST" action="process.php">
			<input type="text" name="text" placeholder="Enter text message"><br>
			<input type="text" name="user" placeholder="Username"><br>
			<button>Submit</button>
		</form>
		<ul class="messages">
			<?php
			while($row = mysqli_fetch_assoc($message)) :?>
				<li> <?php echo $row["text"];?> | <?php echo $row["users"];?>   [<?php echo $row["date"];?>]  <a href="msg.php?action=delete&id=<?php echo $row["id"];?>">X</a></li>
			<?php endwhile ?>
		</ul>
	</div>
<footer>MessageApp &copy;2019</footer>
</div>
</body>
</html>