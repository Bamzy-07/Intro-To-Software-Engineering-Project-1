<?php
session_start();
	include("processForm.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        //An entry is entered
        $firstname = addslashes($_POST['first_name']);
    $lastname = addslashes($_POST['last_name']);
    $user_name = addslashes($_POST['user_name']);
    $personemail = $_POST['emailInput'];
    $phonenumber = $_POST['phone'];
    $personpassword = $_POST['psw'];
    $course = $_POST['subject'];

    if(!empty($user_name) && !empty ($personpassword) && !is_numeric($user_name))

    {
        //save to database
        $user_id = random_num(20);
        $query="INSERT INTO user(user_id,fname,lname,username,email,phone_number,course,password)values('$user_id','$firstname','$lastname','$user_name','$personemail','$phonenumber','$course','$personpassword')";

        mysqli_query($conn,$query);

        header("location: login.php");
        die;
    }else
    {
        echo "Please enter some valid information!";
    }
    }

?>


<html>
<head>
	<title>Registration page</title>
	<style type="text/css">
	*{
		margin:0;
		padding:0;
	}
	body{
		background-image: url(38636.jpg);
		background-position: center;
		background-size: cover;
		font-family: sans-serif;
		margin-top: 40px;
	}
    .login{
        margin-top:30px;
        margin-left: 25px;
        color:white;
        font-size: 25px;
        font-weight: 700;
    }
	.regform{
		width: 800px;
		background-color: rgb(0, 0, 0,0.8);
		margin: auto;
		color: #FFFFFF;
		padding: 10px 0px 10px 0px;
		text-align: center;
		border-radius: 15px 15px 0px 0px;
	}
	.main{
		background-color: rgb(0, 0, 0,0.5);
		width: 800px;
		margin: auto;

	}
	form{
		padding: 10px;
	}
	#name{
		width: 100%;
		height: 50px;
	}
	.name{
		margin-left: 25px;
		margin-top: 30px;
		width: 125px;
		color: white;
		font-size: 18px;
		font-weight: 700;
	}
	.firstname{
		position: relative;
		left: 200px;
		top: -37px;
		line-height: 30px;
		border-radius: 10px;
		padding: 0 22px;
		font-size: 16px;
	}
	.lastname{
		position: relative;
		left: 417px;
		top: -70px;
		line-height: 30px;
		border-radius: 10px;
		padding: 0 22px;
		font-size: 16px;
		color: #555;
	}
	.firstlabel{
		position: relative;
		color: E5E5E5;
		text-transform: capitalize;
		font-size: 14px;
		left: 203px;
		top: -45px;
	}
	.lastlabel{
		position: relative;
		color: E5E5E5;
		text-transform: capitalize;
		font-size: 14px;
		left: 492px;
		top: -72px;
	}
	.username{
		position: relative;
		left: 200px;
		top: -37px;
		line-height: 30px;
		width: 360px;
		border-radius: 10px;
		padding: 0 22px;
		font-size: 16px;
		color: #555;
	}
	.email{
		position: relative;
		left: 200px;
		top: -37px;
		line-height: 30px;
		width: 480px;
		border-radius: 10px;
		padding: 0 22px;
		font-size: 16px;
		color: #555;
	}
	.number{
		position: relative;
		left: 200px;
		top: -37px;
		line-height: 30px;
		width: 300px;
		border-radius: 10px;
		padding: 0 22px;
		font-size: 16px;
		color: #555;
	}
	.option{
		position: relative;
		left: 200px;
		top: -37px;
		line-height: 30px;
		width: 532px;
		height: 40px;
		border-radius: 10px;
		padding: 0 22px;
		font-size: 16px;
		color: #555;
		outline: none;
		overflow: hidden;
	}
	.option option{
		font-size: 20px;
	}
	.password{
		position: relative;
		left: 200px;
		top: -37px;
		line-height: 30px;
		width: 480px;
		border-radius: 10px;
		padding: 0 22px;
		font-size: 16px;
		color: #555;
		font-size: 30px;
	}
	#student{
		margin-left: 25px;
		color: white;
		font-size: 18px;
	}
	.radio{
		display: inline-block;
		padding-right: 70px;
		font-size: 25px;
		margin-left: 25px;
		margin-top: 15px;
		color: white;
	}
	.radio input{
		width: 20px;
		height: 20px;
		border-radius: 50%;
		cursor: pointer;
		outline: none;
	}
	button{
		background-color: #3BAF9F;
		display: block;
		margin: 20px 0px 0px 20px;
		text-align: center;
		border-radius: 12px;
		border: 2px solid #366473;
		padding: 14px 119px;
		outline: none;
		color: white;
		cursor: pointer;
		transition: 0.25px;
	}
	button:hover{
		background-color: #5390F5;
	}

	
	
	
	</style>
</head>

<body>
<a class="login" href="login.php">Click To Login</a>
		<div class="regform"><h1>Registration Form</h1></div>
		<div class="main">
          <form method="post">
			  <div id="name">
				  <h2 class="name">Name</h2>
	 <input class="firstname" type="text" name="first_name"><br>
	 <label class="firstlabel">first name</label>
	 <input class="lastname" type="text" name="last_name"><br>
	 <label class="lastlabel">last name</label>
	</div>
	<h2 class="name">Username</h2>
	<input class="username" type="text" name="user_name"><br>

	<h2 class="name">Email</h2>
	 <input class="email" type="text" name="emailInput"><br>

	<h2 class="name">Phone Number</h2>
	<input class="number" type="number" name="phone">
	
	<h2 class="name">Course</h2>
	<select class="option" name="subject">
		<option disabled="disabled" selected="selected">--Choose Option</option>
		<option>Computer Engineering</option>
		<option>Biomedical Engineering</option>
		<option>Food Processing Engineering</option>

	</select>

	<h2 class="name">Password</h2>
    <input class="password" type="password" name="psw"><br>

	<h2 id="student">Are you a freshman</h2>
	<label class="radio">
		<input class="radio-one" type="radio" name="">
		<span class="checkmark"></span>
		Yes
	</label>
	<label class="radio">
		<input class="radio-two" type="radio"  name="">
		<span class="checkmark"></span>
		No
	</label>
<button type="submit">Register</button><br>


</div>
</form>
</header>

</form>
</body>
</html>