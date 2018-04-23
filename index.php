<html>
<head><title></title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Log in Form</h1>	
<div id="nav">
<form action="" method="post">
	
Firstname<input type="text" name="first" placeholder="firstname" ><br>
Password<input type="password" name="pwd" placeholder="password"><br>

<button type="submit" name="submit">Login	</button><br>
<div id="php">
<?php
	$db = mysqli_connect('localhost','root','','loginform');
	$error = array();
	if(isset($_POST['submit'])){
		$first = $_POST['first'];
		$pass = $_POST['pwd'];
		
if(empty($first)){
						array_push($error,"fill up first name.");
					}	
					
					if(empty($pass)){
						array_push($error,"<br>Fillup the password");
					}

if(count($error) > 0){
						foreach($error as $errors){
						echo $errors;
						}
					}
					if(count($error) == 0){









		/*this were the email and firstname is exist in the database*/
		$query = "SELECT * FROM system WHERE first='$first' AND pwd='$pass' LIMIT 1";
		$result = mysqli_query($db, $query);
		$user = mysqli_fetch_assoc($result);

		if($user){
			echo 'You are successfully Log In';
		}
		else{
			echo 'You have not been register';
		}

	}
}
?>
</div>
<div id="signup">
<a href="signup.php">Sign up</a>
</div>
</form>	
</div>









</body>