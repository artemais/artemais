<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Teste de Sessão</title>
	</head>
	<body>
		<h1>O que Elon Musk pensa sobre espadas medievais</h1>
		<h2>Tudo sobre carros e espadas</h2>
		<p>Blá blá blá forever</p>

		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
			<input type="textbox" name="textbox", placeholder="Comente..."><br><br>
			<input type="submit" name="send" value="Comentar">
		</form>

		<?php
			if ( isset($_POST['send']) )
			{
				if ( ! $_SESSION['email'])
				{
					echo "<p>Faça <a href='login.php'>login</a> para comentar!</p>";
				}
				else
				{
					// comentário
				}
			}
		?>
	</body>
<html>
