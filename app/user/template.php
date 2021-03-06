<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Usuario |HIPPO|</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>
<body>
<header>
	<div class="corpo-header">
		<nav>
			<div class="nav-wrapper">
				<ul  class="left">
					<li class="active_menu" ><a href="../user">Usuario</a></li>
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
		<section>
		
			<form class="busca" method="GET">
				<input class="input-busca" type="text" name="consulta" placeholder="Insira sua consulta">
				<button class="button-busca btn btn-floating btn-large light-blue darken-1" type="submit" name="buscar" id="buscar"><i class="material-icons">search</i></button>
			</form> <br><br>		

			<?php
				if(isset($msg))
					echo "<br>
						  <div class='center-align'>
							<p class='green-text text-darken-3'> <i class='small material-icons'>done</i> $msg </p> 
						  </div>
						  <br>";
				
				if(isset($erro))
					echo "	<br>
							<div class='center-align'>
								<p class='red-text text-accent-4'> <i class='small material-icons'>error</i> $erro </p>
							</div>	
							<br>";
			?>

			<br>
			
			<table class="striped responsive-table">
				<caption><b>Usuários Cadastrados</b></caption>
				<thead>
					<td class="dis-none"><b>ID</b></td>
					<td><b>Login</b></td>
					<td><b>Nome</b></td>
					<td><b>Perfil</b></td>
					<td><b>Ativo</b></td>
					<td><b>Editar</b></td>
					<td><b>Excluir</b></td>
				</thead>

				<?php
					foreach ($usuarios as $idUsuario => $dadosUsuario) {
						$utf_nomeUsuario = $dadosUsuario['nomeUsuario'];
						$utf_nomeUsuario = utf8_encode($utf_nomeUsuario);
						echo 
						"<tr>
							<td class='dis-none'> $idUsuario </td>
							<td> {$dadosUsuario['loginUsuario']} </td>
							<td> $utf_nomeUsuario </td> "?>
							<td class="td-center"> <?php if($dadosUsuario['tipoPerfil'] == "A") echo "Administrador"; 
									   elseif ($dadosUsuario['tipoPerfil'] == "C") echo "Colaborador"; 
									   else echo "Indefinido" ?> </td>
				            <td class="td-center"> <?php if($dadosUsuario['usuarioAtivo'] == 0) echo " <i class='small material-icons red-text'>cancel</i>"; 
				                       elseif($dadosUsuario['usuarioAtivo'] == 1) echo " <i class='small material-icons green-text'>check_circle</i>";
				                       else echo "?" ?> </td>
							<td class='td-center'> <?php echo "<a href='?editar=$idUsuario'> <i class='small material-icons'>edit</i> </a></td>
							<td class='td-center'><a href='?apagar=$idUsuario'> <i class='small material-icons'>delete</i></a></td>
						</tr>";
					} 

				?>
				<tfoot>
					<td class="td-icon"><a class="btn btn-floating btn-large light-blue darken-1 pulse" href="?cadastrar=1"><i class="material-icons">add</i></a></td>
					<td colspan="6">
					<div class="nav-abas">	
						<ul class="pagination">
								<?php
								if($pagina_anterior > 0){ ?>
							<li>
									<a href="index.php?pagina=<?php echo $pagina_anterior; ?>">
										<i class="material-icons">chevron_left</i>
									</a>
							</li>
								<?php }else{ ?>
							<li class="disabled">
										<i class="material-icons">chevron_left</i>
							<?php }  ?>
							</li>
							<?php 
							//Apresentar a paginacao
							for($i = 1; $i < $num_aba+1; $i++){ ?>
								<li class="waves-effect">
									<?php 
									if($i == $pagina){ ?>
									<a class="active_aba" href="index.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
									<?php
									}else{ ?> 
									<a href="index.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>	
									<?php } ?>
								</li>
							<?php } ?>
								<?php
								if($pagina_posterior <= $num_aba){ ?>
							<li class="waves-effect">
									<a href="index.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
										<i class="material-icons">chevron_right</i></a></li>
									</a>
							</li>
								<?php }else{ ?>
							<li class="disabled">
										<i class="material-icons">chevron_right</i></a></li>
							<?php }  ?>
							</li>
						</ul>
					</div>						
					</td>				
				</tfoot>
			</table>	
			<br>
			
		</section>
	
	<footer>
		<p>Copyright © 2017</p>
	</footer>

      <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</body>
</html>		