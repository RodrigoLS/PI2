<html>
<head>
<meta charset="utf-8">
<title>Login |HIPPO|</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
	<header class="headerLogon"> </header>
	<div class="main grey lighten-3 center-align">		
			<form  method="post">
			  <img id="imgLogin" src="img/LogoHippo.jpg" alt="Logo Loja" width="120px" height="120px"><br>

			  <div class="input-field">	
			  	  <input id="loginUser" type="text" name="login" class="validade">
			  	  <label for="loginUser"> Usuário </label>
			 	  <br>
			  </div>
			  <div class="input-field">
				  <input id="loginPass" type="password" name="senha" class="validade">
				  <label for="loginPass">Senha:</label>
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
	<footer>
		<p>Copyright © 2017</p>
	</<footer>
<script src="https://code.jquery.com/jquery-3.2.1.js"
  		integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
 		crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</body>
</html>