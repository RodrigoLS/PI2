<html>
<head>
	<meta charset="utf-8">
	<title>ADO PHP</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>
<body>
	<div id="cabecalho"> 
		<nav>
			<div class="nav-wrapper">
		      <ul  class="left">
		        <li><a>Usuario</a></li>
				<li><a>Categoria</a></li>
				<li><a>Produto</a></li>
				<li><a href="sair.php">Sair</a></li>
		      </ul>
	    	</div>
    	</nav>
	</div>
		<section>
			 <?php  
			 	session_start();
			 	echo "<p> Olá, " . $_SESSION['nomeUsuario'] . ".</p>";
			 	echo "<p> O sistema ainda está em desenvolvimento. </p>";
			 	echo "<p> Desde já, pedimos desculpas pelo transtorno.</p>";
			 	echo "<p> Atenciosamente, equipe HIPPO. </p>";
			 ?>

			 <img src="../img/LogoHippo.jpg" alt="Logo Loja" width="200px" height="200px" id="LogoMenu">
		</section>
	<div id="rodape">
		<p>Copyright © 2017</p>
	</div>
</body>
</html>		