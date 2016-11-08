<html>
	<head>
		<title>Registration Form</title>
	</head>

<body>
<form method='post' action='registration.php'>
	<table width='400' border='5' align='center'>
	<tr>
		<td colspan='5'><h1>Registration Form</h1></td>

	</tr>
	<tr>
		<td>Username:</td>
		<td><input type='text' name='name'/></td>

	</tr>
	<tr>
		<td>User Password:</td>
		<td><input type='password' name='pass'/></td>

	</tr>

	<tr>
		<td>Email:</td>
		<td><input type='text' name='email' /></td>

	</tr>
	<tr>
		<td colspan='5' align='center'><input type='submit' name='submit' value='Sign Up'/></td>

	</tr>
	</table>
</form>
<center><b>Already Registered? </b><a href='login.php'>Login Here</a></center>






</body>
</html>
<?php
mysql_connect("localhost","root","password"); //connect
mysql_select_db("user_db"); //select database

	if(isset($_POST['submit'])){

	 $user_name = $_POST['name'];
	 $user_pass = $_POST['pass'];
	 $user_email = $_POST['email'];

	 if($user_name==''){
	 	echo "<script>alert('Please enter your name!')</script>";
	 	//if this filled is not filled than it will not move forward
	 	exit();

	 }
	 if($user_pass==''){
	 	echo "<script>alert('Please enter your password!')</script>";
	 	exit();
	 }
	 if($user_email==''){
	 	echo "<script>alert('Please enter your email!')</script>";
	 	exit();
	 }

	 //check email if it exists in database
	 $check_email = "select * from users where user_name='$user_email'";

	 $run = mysql_query($check_email);
	//aa run nahi thatu 
	 if(mysql_num_rows($run) > 0) {
	 	echo "<script>alert('Email $user_email is already exist in our database. Please try another one.')</script>";
	 	exit();
	 }

	 $query = "insert into users (user_name,user_pass,user_email) values ('$user_name','$user_pass','$user_email')";
	 if(mysql_query($query)){
	 	echo "<script>window.open('welcome.php','_self'></script>";

	 }

}



?>












