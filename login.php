<?php
session_start();
include("processForm.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD']=="POST")
{
    //An entry has to be read from the database
$user_name = addslashes($_POST['user_name']);
$personpassword = $_POST['psw'];


if(!empty($user_name) && !empty ($personpassword) && !is_numeric($user_name))

{
    //save to database
   
    $query="select * from user where username ='$user_name' limit 1";

    $result=mysqli_query($conn,$query);

    if($result)
    {
        if($result && mysqli_num_rows($result)>0)
        {
            $user_data= mysqli_fetch_assoc($result);
            
            if($user_data['password']===$personpassword)
            {
                $_SESSION['user_id'] = $user_data['user_id'];
                header("location: index.html");
                die;

            }
        }
    }
    echo "Wrong Username or Password!";
   
}else
{
    echo "Wrong Username or Password!";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Login</title>
    <style type="text/css">
	*{
		margin:0;
		padding:0;
	}
	body{
		background-image: url(685208.jpg);
		background-position: center;
		background-size: overflow;
		font-family: sans-serif;
		margin-top: 40px;
	}
	.regform{
		width: 800px;
		background-color: rgb(0, 0, 0,0.9);
		margin: auto;
		color: #FFFFFF;
		padding: 10px 0px 10px 0px;
		text-align: center;
		border-radius: 15px 15px 0px 0px;
	}
	.main{
		background-color: rgb(0, 0, 0,0.7);
		width: 800px;
		margin: auto;

	}
	form{
		padding: 10px;
	}
	
	.name{
		margin-left: 25px;
		margin-top: 30px;
		width: 125px;
		color: white;
		font-size: 18px;
		font-weight: 700;

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
	
	
	
	.password{
		position: relative;
		left: 200px;
		top: -37px;
		line-height: 30px;
		width: 360px;
		border-radius: 10px;
		padding: 0 22px;
		font-size: 16px;
		color: #555;
		font-size: 30px;
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
<div class="regform"><h1>Login</h1></div>
		<div class="main">
          <form method="POST">
			  <div id="name">
	
	<h2 class="name">Username</h2>
	<input class="username" type="text" name="user_name"><br>

	<h2 class="name">Password</h2>
    <input class="password" type="password" name="psw"><br>

<button type="submit">Login</button><br>
<a class="name" href="registration.php">Dont have an account----SignUp</a>

</div>
</form>
</header>
    
</body>
</html>