<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TESTE</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  <!-- Compiled and minified CSS -->
  	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	  <!-- Compiled and minified JavaScript -->
  	  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  	  <link rel="stylesheet" type="text/css" href="css/estilo.css">
          
</head>
<body id="body-logon">
  	<header class="login col s12 m12 l12">
	</header>
	<section class="login valign-wrapper">
	  <div class="row full">
				<div class="main grey lighten-3 col s12 m8 offset-m2 l4 offset-l4 center-align">		
					<form  method="post">
					    <img class="responsive-img" id="imgLogin" src="img/LogoHippo.jpg" alt="Logo Loja" width="120px" height="120px"><br>
						  	<div class="input-field">	
						  		<input id="loginUser" type="text" name="login" class="validade">
						  	  	<label for="loginUser">Usuário</label>
						 	  	<br>
						  	</div>
						  	<div class="input-field">
								<input id="loginPass" type="password" name="senha" class="validade">
							  	<label for="loginPass">Senha</label>
						  	  	<br>
						  	</div>
						  	<button class="waves-effect waves-light btn-large btn-log" type="submit" value="Login" name="btnLogin">Login</button>
						  	<br>
							<?php 
							if(isset($msg)){
							echo "<br><b>$msg</b><br>";
							}
							?>
					</form> 
				</div>
	  </div>
  	</section>
  	<footer class="login col s12 m12 l12 valign-wrapper">
		<p>Copyright © 2017</p>  		
  	</footer>
<script src="https://code.jquery.com/jquery-3.2.1.js"
  		integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
 		crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</body>
</html>