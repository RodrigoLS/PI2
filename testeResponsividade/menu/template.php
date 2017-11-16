<html>
<head>
	<meta charset="utf-8">
	<title>MENU |HIPPO| </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
  <!-- Jquerry-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>   
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.js"></script>
</head>
<body>
<header class="row purpura">
	<div class="col s12 m8 offset-m2 l6 offset-l3">
		<nav>
			<div class="nav-wrapper">
				<ul class="left">
					<li><a href="../user">Usuario</a></li>
					<li><a href="../categoria">Categoria</a></li>
					<li><a href="../produto">Produto</a></li>
				</ul>
				<img src="../img/LogoHippo.jpg" alt="Logo Loja" class="brand-logo center" id="LogoMenu">
				<ul class="valign-wrapper right">
					<li><?php echo "<p> Olá <b>".$_SESSION['nomeUsuario']."</b></p>" ?></li>
					<li><a href="sair.php"><i class="large material-icons">exit_to_app</i></a></li>
				</ul>
			</div>
		</nav>
	</div>
</header>	
		<section id="sec-menu">
			<article class="center-align">
				<p class="text-1">Olá <span class="text-2"><?php echo $_SESSION['nomeUsuario'];?>!</span></p>
				<p class="text-1">seja bem vindo</p>
				<p class="text-1">ao sistema <span class="text-3">HIPPO.</span></p>
			</article>
		</section>

	<?php  
		require('../layout/rodape.php');
	?>
</body>
</html>		