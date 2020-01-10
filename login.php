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
		</header>
			<nav class="navbar navbar-expand-md bg-artemais navbar-dark">
  			<a class="navbar-brand" href="#"><i class="fas fa-home"></i></a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    			<span class="navbar-toggler-icon"></span>
  			</button>
  			<div class="collapse navbar-collapse" id="collapsibleNavbar">
    			<ul class="navbar-nav">
						<li class="navbar-nav">
							<a class=""> <!-- Inserir espaço aqui -->
						</li>
      			<li class="nav-item">
        			<a class="nav-link" href="#">Tecnologia</a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link" href="#">Ciência</a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link" href="#">Música</a>
      			</li>
						<li class="nav-itemm">
        			<a class="nav-link" href="#">Cinema</a>
      			</li>
						<li class="nav-item">
        			<a class="nav-link" href="#">Games</a>
      			</li>
						<li class="nav-item">
							<input class="form-control mr-sm-2" type="text" placeholder="Pesquisar">
						</li>
						<li class="nav-item">
    					<button class="btn btn-light" type="submit"><i class="fas fa-search"></i></button>
						</li>
						<li class="nav-item">
							<button class="btn btn-light" type="submit">Entrar</button>
						</li>
    			</ul>
  			</div>
			</nav>

		<!-- END HEADER -->

		<!-- LOGIN -->

    <div class="container-fluid">
    	<div class="row justify-content-center align-self-center">
    		<div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3 h-100">
					<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
						<h4>Login</h4>
						<input type="email" name="email" placeholder="Email" class="form-control" required><br><br>
						<input type="password" name="password" placeholder="Senha" class="form-control" required><br><br>
						<input type="submit"  name="signin" value="Login">

						<!-- CADASTRO -->
						<p>Não tem conta?</p>
							<!-- Button to Open the Modal -->
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  								Cadastro
								</button>
							<!-- The Modal -->
							<div class="modal fade" id="myModal">
  							<div class="modal-dialog">
    							<div class="modal-content">

      							<!-- Modal Header -->
      							<div class="modal-header">
        							<h4 class="modal-title">Cadastro</h4>
        							<button type="button" class="close" data-dismiss="modal">&times;</button>
      							</div>

      							<!-- Modal body -->
      							<div class="modal-body">
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

      							</div>

      							<!-- Modal footer -->
      							<div class="modal-footer">
        							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      							</div>

    							</div>
  							</div>
							</div>
					</form>
				</div>
			</div>
		</div>

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


		<!-- CADASTRO -->
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

          $insert_user = "INSERT INTO user (first_name, last_name, nick, user_email, user_password) VALUES     ('$first_name', '$last_name', '$nick', '$email', '$password')";
 
          if ( mysqli_query($dbcon, $insert_user) )
          {
            echo "<p>Obrigado por cadastrar-se, faça <a href='login.php'>login</a>!</p>";
         }
        }
      ?>

		<!-- END CADASTRO -->

	</body>
</html>

