<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta charset="UTF-8">
  	<meta name="description" content="Revista Eletrônica">
  	<meta name="keywords" content="Arte, Tecnologia, Games">
  	<meta name="author" content="Arte +">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="assets/main.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<title>Login</title>

	</head>
	<body>

		<!-- HEADER -->
		<header class="bg-artemais">
			<div class="row text-center">
				<div class="col"></div>
				<div class="col">
					<a class="" href="index.php">
						<img src="assets/img/logoartemais(350x350).png" width="130px" height="100px">
					</a>
				</div>
				<div class="col"></div>
			</div>
			<nav class="navbar navbar-expand-md bg-artemais">
				<!-- Navigation -->
				<li class="nav-item">
					<a href="index.php"><i class="fas fa-home"></i></a>
				</li>
				<li class="nav-item">
					<a class="category" href="#">Tecnologia</a>
				</li>
				<li class="nav-item">
					<a class="category" href="#">Ciência</a>
				</li>
				<li class="nav-item">
					<a class="category" href="#">Música</a>
				</li>
				<li class="nav-item">
					<a class="category" href="#">Cinema</a>
				</li>
				<li class="nav-item">
					<a class="category" href="#">Games</a>
				</li>

			</nav>
		</header>

		<!-- END HEADER -->

		<!-- LOGIN -->
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

		<!-- END LOGIN -->

	</body>
</html>

