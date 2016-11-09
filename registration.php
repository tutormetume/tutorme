<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    body, html{
     height: 100%;
     background-image: url("registration.jpeg");
    /*background-repeat: no-repeat;*/
    /*background-color: #d3d3d3;*/
    font-family: 'Oxygen', sans-serif;
}

.main{
    margin-top: 70px;
    
}

h1.title { 
    font-size: 50px;
    font-family: "Arial",Helvetica,sans-serif; 
    font-weight: 400; 
}

hr{
    width: 10%;
    color: #fff;
}

.form-group{
    margin-bottom: 15px;
}

label{
    margin-bottom: 15px;
}

input,
input::-webkit-input-placeholder {
    font-size: 11px;
    padding-top: 3px;
}

.main-login{
    background-color: #fff;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

}

.main-center{
    margin-top: 30px;
    margin: 0 auto;
    max-width: 330px;
    padding: 40px 40px;

}

.login-button{
    margin-top: 5px;
}

.login-register{
    font-size: 11px;
    text-align: center;
}


   </style> 
</head>

<body>
<form method='post' action='registration.php'>
       
	   <div class="container">

            <div class="row main">
                <div class="panel panel-primary">
                   <div class="panel-title pull-left" style="padding-top: 7.5px;">
                        <hr />
                    </div>
                </div> 
                <div class="main-login main-center">
                    <form class="form-horizontal" method="post" action="#">
                        
                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Your Name</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Your Email</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Username</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="cols-sm-2 control-label">Password</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
			    <!--js needed -->
			   <!-- <input type="button" onclick="location.href='welcome.php';" value="Register" />-->
                            <button type="button" class="btn btn-primary btn-lg btn-block login-button" onclick="location.href='welcome.php';" value="Register">Register</button>


                        </div>
                        <div class="login-register">
                            <a href="login.php">Login</a>
                         </div>
                    </form>
                </div>
            </div>
</form>
<br>







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
	 $check_email = "select * from users where user_email = '$user_email'";

	 $run = mysql_query($check_email);

	 if(mysql_num_rows($run) > 0) {
	 	echo "<script>alert('Email $user_email is already exist in our database. Please try another one.')</script>";
	 	exit();
	 }

	 $query = "insert into users (user_name,user_pass,user_email) values ('$user_name','$user_pass','$user_email')";
	 if(mysql_query($query)){
	 	echo "<script>window.open('welcome.php','_self')></script>";

	 }

}



?>












