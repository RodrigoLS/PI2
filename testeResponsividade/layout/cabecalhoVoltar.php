	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">

<header>
	<div class="corpo-header">
		<nav>
			<div class="nav-wrapper">
				<ul  class="left">
					<li><a href="index.php"> <i class="large material-icons"> keyboard_return </i></a> </li>
					<li><a href="../user">Usuario</a></li>
					<li><a href="../categoria">Categoria</a></li>
					<li><a href="../produto">Produto</a></li>
				</ul>
				<img src="../img/LogoHippo.jpg" alt="Logo Loja" class="brand-logo center" id="LogoMenu">
				<ul class="right">
					<li><?php echo "<p> Olá <b>".$_SESSION['nomeUsuario']."</b></p>" ?></li>
					<li><a href="sair.php"><i class="large material-icons">exit_to_app</i></a></li>
				</ul>
			</div>
		</nav>
	</div>
</header>