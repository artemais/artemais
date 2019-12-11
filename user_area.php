<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Área do Usuário</title>
	</head>
	<body>
		<h2>Bem-vindo(a)</h2>
		<p>Você está logado com o email <?php echo $_SESSION['email']; ?> </p>
		<input type="submit" name="logout" value="sair">

		<?php
			if ( isset($_POST['logout']))
			{
				session_start();
				session_destroy();
				header("location:index.html");
			}
		?>
	</body>
<html>
