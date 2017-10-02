<html>
<head>
<meta charset="utf-8">
<title>ADO PHP</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
	<div id="cabecalho"> </div>
	<div class="main grey lighten-3 center-align">		
			<form  method="post">
			  <img class="circle" src="img/LogoHippo.jpg" alt="Logo Loja" width="120px" height="120px"><br>	
			  <label> Usuário: </label>
			  <br>
			  <input type="text" name="login">
			  <br>
			  <label>Senha:</label>
			  <input type="password" name="senha" >
			  <br>
			  <input class="waves-effect waves-light btn-large center-align red"type="submit" value="Login" name="btnLogin">
			  <br>
			<?php 
			if(isset($msg)){
				echo "<br><b>$msg</b><br>";
			}
			?>
			</form> 
	</div>
	<div id="rodape">
		<p>Copyright © 2017</p>
	</div>
</body>
</html>