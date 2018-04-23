<html>
<link rel="stylesheet" href="stylesign.css">
	<body>
		<h1>Sign Up Form</h1>

		<div id="nav">
		<form action="" method="POST">
			<input type="text" name="first" placeholder="Firstname"><br>
			<input type="text" name="email" placeholder="E-mail"><br>
			<input type="Password" name="pwd" placeholder="Password"><br>
			<input type="Password" name="conpwd" placeholder="Confirm Password"><br>
			<button type="submit" name="submit">Sign up</button><br>
			
		
<div id="php">
			<?php

				$db = mysqli_connect('localhost','root','','loginform');
				$error = array();
				
				if(isset($_POST['submit'])){
					$first = mysqli_real_escape_string($db, $_POST['first']);
					$email = mysqli_real_escape_string($db, $_POST['email']);
					$pass = mysqli_real_escape_string($db, $_POST['pwd']);
					$conpwd = mysqli_real_escape_string($db, $_POST['conpwd']);
					/*if the fieldset is not fill out the system will message error*/
					if(empty($first)){
						array_push($error,"fill up first name.");
					}	
					if(empty($email)){
						array_push($error,"<br>fill up email");
					}
					if(empty($pass)){
						array_push($error,"<br>Fillup the password");
					}
					if($pass != $conpwd){
						array_push($error,"<br>Password do not match");
					}

					/*if the email and firstname has exist in the database*/
					$check_user = "SELECT * FROM system WHERE first='$first' OR email='$email' LIMIT 1";
					$result = mysqli_query($db, $check_user);
					$user = mysqli_fetch_assoc($result);	
					if($user){
						if($user['first'] === $first){
							array_push($error, "<br>First name exist.");
						}
						if($user['email'] === $email){
							array_push($error, "<br>Try another Email.");
						}
					}
					if(count($error) > 0){
						foreach($error as $errors){
						echo $errors;
						}
					}
					if(count($error) == 0){

					$query = "INSERT INTO system(first, email, pwd) VALUES ('$first', '$email', '$pass')";
					mysqli_query($db, $query);
					if($query)
					{
					echo 'You are now registered';	
					}

					}
				}
				

			?></div><br>
			<a href="index.php">Cancel</a>
		</form>
		</div>
	</body>
</html>