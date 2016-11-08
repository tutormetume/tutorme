<?php
require ('init.php');

if(isset($_POST['submit'])) {

	$name = mysql_escape_string($_POST['name']);
	$lname = mysql_escape_string($_POST['lname']);
	$uname = mysql_escape_string($_POST['uname']);
	$pass = mysql_escape_string($_POST['pass']);
	$email = mysql_escape_string($_POST['email']);
	$cellphone = mysql_escape_string($_POST['cellphone']);

	//$pass = md5($pass);
	$sql = mysql_query("SELECT * FROM `signup` WHERE `uname` = '$uname'");
	if(mysql_num_rows($sql) > 0) {
		echo "That user already exists";
		exit();
	}

	mysql_query("INSERT INTO `signup`(`id`,`name`,`lname`,`uname`,`pass`,`email`,`cellphone`) VALUES (NULL, '$name', '$lname', '$uname', '$pass', '$email', '$cellphone');");

} else {

$form = <<<EOT
<form action = "signup.php" method = "POST">
First Name: <input type = "text" name = "name" /><br />
Lase Name: <input type = "text" name = "lname" /><br />
Username: <input type = "text" name = "uname" /><br />
Password: <input type = "password" name = "pass" /><br />
Email: <input type = "text" name = "email" /><br />
Cell Phone: <input type = "text" name = "cellphone" /><br />
<input type="submit" value = "Signup" name = "submit" />
</form>
EOT;
	echo $form;
}

?>
