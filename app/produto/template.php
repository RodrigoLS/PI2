<html>
<head>
	<meta charset="utf-8">
	<title>Produto |HIPPO|</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
  <!-- Jquerry-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>   
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.js"></script>
</head>
<body>
<header>
	<div class="corpo-header">
		<nav>
			<div class="nav-wrapper">
				<ul  class="left">
					<li><a href="../user">Usuario</a></li>
					<li><a href="../categoria">Categoria</a></li>
					<li class="active_menu" ><a href="../produto">Produto</a></li>
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
		<section class="produto">

			<form class="busca" method="GET">
				<input class="input-busca" type="text" name="consulta" placeholder="Insira sua consulta">
				<button class="button-busca btn btn-floating btn-large light-blue darken-1" type="submit" name="buscar" id="buscar"><i class="material-icons">search</i></button>
			</form> <br><br>	
			
			<br>			
			<table class="striped responsive-table">
				<thead>
					<td class="dis-none"><b>ID</b></td>
					<td><b>Nome</b></td>
					<td><b>Preço(R$)</b></td>
					<td><b>Desconto(%)</b></td>
					<td><b>Categoria</b></td>
					<td><b>Ativo</b></td>
					<td><b>Alterado por</b></td>
					<td><b>Qtd no Estoque</b></td>
					<td><b>Detalhes/Imagem</b></td>
					<td><b>Editar</b></td>
					<td><b>Excluir</b>	</td>
				</thead>
				<?php
					foreach ($produtos as $idProduto => $dadosProduto) {
						$utf_nomeProduto = $dadosProduto['nomeProduto'];
						
						$utf_descProduto = $dadosProduto['descProduto'];
						
						$mod_dadosProduto = $dadosProduto['precProduto'];
						$mod_dadosProduto = number_format($mod_dadosProduto,2);
						$mod_descontoProduto = $dadosProduto['descontoPromocao'];
						$mod_descontoProduto = number_format($mod_descontoProduto,0);
						$img_imagem_base64 = $dadosProduto['imagem'];
						$img_imagem_base64 = base64_encode($img_imagem_base64);
						$img_imagem_base64 = "<img height='200px' weight='200px 'src=\"data:image/jpeg;base64,".$img_imagem_base64."\">";
						echo 
						"<tr>
							<td class='dis-none'> $idProduto </td>
							<td> $utf_nomeProduto </td>
							<td> $mod_dadosProduto </td>
							<td class='td-center'> $mod_descontoProduto </td>
							<td>";  
							
								include('../db/bancodedados.php');					
								$query = odbc_exec($db, 'SELECT idCategoria, nomeCategoria FROM Categoria');		
								$info_categoria = array();
									while ($resul = odbc_fetch_array($query)) {
										$resul['nomeCategoria'] = utf8_encode($resul['nomeCategoria']);
										$info_categoria[$resul['idCategoria']] = $resul['nomeCategoria']; 			
									}	
									foreach ($info_categoria as $id => $valor) {	
										if ($dadosProduto['idCategoria'] == $id) {	
											echo $valor;	
										}
									}
				?>
 							<td class="td-center"> <?php if($dadosProduto['ativoProduto'] == 0) echo " <i class='small material-icons red-text'>cancel</i>"; 
				                elseif($dadosProduto['ativoProduto'] == 1) echo " <i class='small material-icons green-text'>check_circle</i>";
				                else echo "?" ?> </td>
							<td>
				<?php
								$query = "";
								$query = odbc_exec($db, 'SELECT idUsuario, nomeUsuario FROM Usuario');
								$info_usuario = array();
								$resul = "";
									while ($resul = odbc_fetch_array($query)) {	
										$resul['nomeUsuario'] = utf8_decode($resul['nomeUsuario']);
										$info_usuario[$resul['idUsuario']] = $resul['nomeUsuario'];	
									}	
									$id = "";
									foreach ($info_usuario as $id => $nome) {	
										if ($dadosProduto['idUsuario'] == $id) {	
											echo $nome;	
										}	
									}	
						echo 
						"</td>
							<td class='td-center'> {$dadosProduto['qtdMinEstoque']} </td>
							<td class='td-center'><a class='waves-effect waves-light btn modal-trigger blue darken-1' href='#$idProduto'><i class='small material-icons'>more_horiz</i></a></td>
							<td class='td-center'><a href='?editar=$idProduto'> <i class='small material-icons'>edit</i> </a></td>
							<td class='td-center'><a href='?apagar=$idProduto'> <i class='small material-icons'>delete</i></a></td>
							<div id='$idProduto' class='modal'>
							    <div class='modal-content'>
							    	<div class='center-align'>
								    	<b>$utf_nomeProduto</b>
								    	<br><hr><br>
										$utf_descProduto
										<br><hr><br>
										$img_imagem_base64
										<hr>
									</div>
							    </div>
							    <div class='modal-footer'>
							      <a href='#!'' class='modal-action modal-close waves-effect waves-green btn-flat'>Retornar</a>
							    </div>
							</div>
						</tr>";
					} 
				?>
				<tfoot>
					<td><a class="btn btn-floating btn-large light-blue darken-1 pulse" href="?cadastrar=1"><i class="material-icons">add</i></a></td>
					<td colspan="11">
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
				

				if(isset($erroImagem))
					echo "	<br>
							<div class='center-align'>
								<p class='red-text text-accent-4'> <i class='small material-icons'>error</i> $erroImagem </p>
							</div>	
							<br>";
			?>		
		</section>
	
	<?php  
		require('../layout/rodape.php');
	?>
	<script>
       	$(document).ready(function() {
    	$('select').material_select();
        });
    </script>	
	<script type="text/javascript">
    $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
      </script>
</body>
</html>		