<?php 
session_start();

	include("connection_login_db.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_roll = $_POST['user_roll'];
		$password = password_hash($_POST['password'] , PASSWORD_BCRYPT);

		if(!empty($user_roll) && !empty($password) && is_numeric($user_roll))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (id,user_college_id,password) values ('$user_id','$user_roll','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input id="text" type="text" name="user_roll"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="signup.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>