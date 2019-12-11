<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cadastro</title>
	</head>
	<body>
		<h4>Cadastro</h4>
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
			<input type="text" name="first_name" placeholder="Nome" required><br><br>
			<input type="text" name="last_name" placeholder="Sobrenome" required><br><br>
			<input type="text" name="nick" placeholder="Apelido" required><br><br>
			<input type="email" name="email" placeholder="Email" required><br><br>
			<input type="password" name="password" placeholder="Senha" required><br><br>
			<input type="password" name="password2" placeholder="Confirmar" required><br><br>
			<input type="checkbox" name="privacy" required><small>Eu li e concordo com os</small>
				<a href="privacy.php" target="_blank">
					<small>Termos de Uso.</small><br><br>
				</a>
			<input type="submit" name="signup" value="Enviar">
		</form>

		<?php
			include("db_connect.php");

			if ( isset($_POST['signup']) )
			{
				$first_name = $_POST['first_name'];
				$last_name = $_POST['last_name'];
				$nick = $_POST['nick'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$password2 = $_POST['password2'];

				if ( $first_name == '' )   
				{
					echo "<p>Por favor, insira um nome!</p>";           
					exit();
				}
				if ( $last_name == '' )
				{
					echo "<p>Por favor, insira um sobrenome!</p>";
					exit();
				}
				if ( $nick == '' )
				{
					echo "<p>Por favor, insira um nick!</p>";
					exit();
				}
				if ( $email == '' )
				{
					echo "<p>Por favor, insira um email!</p>";
					exit();
				}
				if ( $password == '' )
				{
					echo "<p>Por favor, insira uma senha!</p>";
					exit();
				}
				if ( $password2 == '' )
				{
					echo "<p>Por favor, confirme a senha!</p>";
					exit();
				}
				if ( $password != $password2 )
				{
					echo "<p>As senhas devem ser iguais!</p>";
					exit();
				}

				$verify_email_query = "SELECT * FROM user WHERE user_email = '$email'";
				$verify_email = mysqli_query($dbcon, $verify_email_query);

				if ( mysqli_num_rows($verify_email) > 0)
				{
					echo "<p>O email $email já existe!</p>";
					exit();
				}

				$insert_user = "INSERT INTO user (first_name, last_name, nick, user_email, user_password) VALUES ('$first_name', '$last_name', '$nick', '$email', '$password')";

				if ( mysqli_query($dbcon, $insert_user) )
				{
					echo "<p>Obrigado por cadastrar-se, faça <a href='login.php'>login</a>!</p>";
				}
			}
		?>
	</body>
</html>
