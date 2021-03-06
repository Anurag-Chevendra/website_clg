<?php
session_start();
	
    include("connection_login_db.php");
    include("functions.php");

    $user_data = check_login($con);

	if(isset($_POST['submit'])){

		$physics_book = $_POST['physics_Book'];
		$chemistry_book=$_POST['chemistry_Book'];
		$math_book=$_POST['math_Book'];

		if($_POST['physics_Book'] != "none"){
			$physics_book=1;

		}
		else{
			$physics_book=0;
		}


		if($_POST['chemistry_Book']!="none"){
			$chemistry_book=1;
		}
		else{
			$chemistry_book=0;
		}


		if($_POST['math_Book']!="none"){
			$math_book=1;
		}
		else{
			$math_book=0;
		}
	}
	

?>



<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
<body>

	<a href="login.php">Logout</a><br/>
	<?php echo $user_data['user_college_id']; ?>
	<h1>Welcome to the borrowing site!</h1>
	<br>

	<form id="form_physics_book" method="post" >
		<label>Enter the PHYSICS Book     : </label>
		
		
		<select name="physics_Book" id="physics_Book">
        <option value="none">None</option>
        <option value="book1">book1</option>
        <option value="book2">book2</option>
    </select><br/>

	<form id="form_chemistry_book" method="post" >
		<label>Enter the CHEMISTRY Book   : </label>
		<select name="chemistry_Book" id="chemistry_Book">
        <option value="none">None</option>
        <option value="book1">book1</option>
        <option value="book2">book2</option>
    </select><br/>

	<form id="form_math_book" method="post" >
		<label>Enter the MATH Book        : </label>
		<select name="math_Book" id="math_Book">
        <option value="none">None</option>
        <option value="book1">book1</option>
        <option value="book2">book2</option>
    </select><br/>

	<input type="submit" value="submit" name="submit">
	</form>

	<?php
	if(isset($_POST['submit'])){
		
		$clgid=$user_data['user_college_id'];
		$dbid=$user_data['id'];
		echo $dbid;

		$query1 = "select * from borrowing_users where id = '$dbid' limit 1";
		$result1= mysqli_query($con,$query1);
		
		if(mysqli_num_rows($result1)>0){
			echo "hereeee";
			$sql1 = "UPDATE borrowing_users SET physics = '$physics_book' WHERE id = '$dbid'";
			mysqli_query($con,$sql1);
	
			$sql2 = "UPDATE borrowing_users SET chemistry = '$physics_book' WHERE id = '$dbid'";
			mysqli_query($con,$sql2);

			$sql3 = "UPDATE borrowing_users SET math = '$math_book' WHERE id = '$dbid'";
			mysqli_query($con,$sql3);

	
		}
		else{
			$query = "insert into borrowing_users (id,physics,chemistry,math,user_roll_no) values ('$dbid','$physics_book','$chemistry_book','$math_book','$clgid')";
			echo $dbid;
			echo "hre";
			echo $clgid;
			mysqli_query($con, $query);


		}
		
		

	}?>


</body>
</html>