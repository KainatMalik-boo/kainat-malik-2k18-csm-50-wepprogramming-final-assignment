<?php
session_start();

require_once 'utilities/user.php';

if(isset($_POST['user-name'])) {
	$user_name = $_POST['user-name'];
	$user_pass = $_POST['user-pass'];

	$user = do_login($user_name, $user_pass);
	
	if($user != null) {
		$_SESSION["_user"] = $user;
		header("Location: home.php");
		$login_fail_message = "Username or password mismatched";
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="style.css">
		<title>Main</title>
	</head>
	<body>
		<div style="text-align: center">
			<h1>Login Form</h1>
			<?php if(isset($login_fail_message)==1):?>
			<div class="error-message"><?=$login_fail_message;?></div>
			<?php endif;?>

			<form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
				<div>
					<label
						>User Name
						<input type="text" name="user-name" required />
					</label>
				</div>
				<div>
					<label
						>User Password
						<input type="password" name="user-pass" required />
					</label>
				</div>
				<div>
					<input type="submit" value="Submit" />
				</div>
			</form>
		</div>
	</body>
</html>
