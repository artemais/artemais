<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
	</head>
	<body>
		<h4>Login</h4>

		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
			<input type="email" name="email" placeholder="Email" required><br><br>
			<input type="password" name="password" placeholder="Senha" required><br><br>
			<input type="submit"  name="signin" value="Login">
			<p>Não tem conta? <a href="cadastro.php">Cadastre-se</a>
		</form>

		<?php
			include("db_connect.php");

			if ( isset($_POST['signin']) )
			{
				$user_email = $_POST['email'];
				$user_password = $_POST['password'];

				if ( $user_email == '' )
				{
					echo "<p>Por favor, insira um email!</p>";
					exit();
				}
				if ( $user_password == '' )
				{
					echo "<p>Por favor, insira uma senha!</p>";
					exit();
				}		

				$verify_user_query = "SELECT * FROM user WHERE user_email = '$user_email' AND user_password = '$user_password'";
				$verify_user = mysqli_query($dbcon, $verify_user_query);

				if ( mysqli_num_rows($verify_user) )
				{
					header("location: user_area.php");
					$_SESSION['email'] = $user_email;
				}
				else
				{
					echo "<p>Email ou Senha incorretos!</p>";
				}

			}
		?>
	</body>
</html>

