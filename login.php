<?php

session_start();
    include("connection_login_db.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD']== "POST")
    {
        $user_roll = $_POST['user_roll'];
        $password = $_POST['password'];
		
    }

    if( !empty($user_roll) && !empty($password))
    {
        $query = "select * from users where user_college_id = '$user_roll' limit 1";

        $result = mysqli_query($con, $query);

        if($result)
        {
            if(mysqli_num_rows($result)>0)
            {
                $user_data= mysqli_fetch_assoc($result);

                if(password_verify($password,$user_data['password']))
                {
                    $_SESSION['user_id'] = $user_data['id'];
                    header("Location: index.php");
                    die;
                }
            }
        }
        echo ("wrong rollno/password , re-enter");

    }
    else{
        

    }


?>



<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="user_roll"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>