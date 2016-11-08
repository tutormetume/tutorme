<?php
require ("init.php");

if(isset($_POST['submit'])) {
	$uname = mysql_escape_string($_POST['$uname']);
	$pass = mysql_escape_string($_POST['$pass']);
	//$pass = md5($pass)

	$sql = mysql_query("SELECT * FROM `signup` WHERE `uname` = '$uname' AND `pass` = '$pass'");
	if(mysql_num_rows($sql) > 0) {
		echo " You are Logged In.";
		exit();
	} else {
		echo "wrong id pass";
	}
} else {

$form = <<<EOT
<form action = "login.php" method = "POST">
Username = <input type = "text" name = "uname" /><br />
Password = <input type = "password" name = "pass" /><br />
<input type = "submit" name="submit" value="Login" />
EOT;

	echo $form;
}

?>
